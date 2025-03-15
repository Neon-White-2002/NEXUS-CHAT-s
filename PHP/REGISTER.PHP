<?php
    @include_once 'CONFIG.PHP';

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // REGISTER-FORM-DATA:
        $user_name = mysqli_real_escape_string($connection, $_POST["user-name"]);
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $password = md5($_POST["password"]);
        $confirm_password = md5($_POST["confirm-password"]);
        $job = mysqli_real_escape_string($connection, $_POST["job"]);

        // LET'S CHECK, ALL THE INPUT-FIELD:
        if(!empty($user_name) && !empty($email) && !empty($password) && !empty($confirm_password) && !empty($job))
        {
            // LET'S CHECK USER-EMAIL-ADDRESS:
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $sql = mysqli_query($connection, "SELECT EMAIL FROM `nexus_user` WHERE EMAIL = '{$email}'");
                if(mysqli_num_rows($sql) > 0)
                {
                    echo "USER-EXIST-ERROR";
                }
                else
                {
                    // LET'S CHECK USER-PASSWORD:
                    if($password != $confirm_password)
                    {
                        echo "PASSWORD-ERROR";
                    }
                    else
                    {
                        $time = time(); // CURRENT-TIME
                        $status = "Online"; // USER-ACTIVE-STATUS
                        $random_id = rand(time(), 10000000); // NEW-RANDOM USER-ID

                        // LET'S INSERT ALL DATA INTO TABLE:
                        $insert = mysqli_query($connection, "INSERT INTO `nexus_user` (UNIQUE_ID, USER_NAME, EMAIL, PASSWORD, JOB, STATUS)
                                                VALUES ({$random_id}, '{$user_name}', '{$email}', '{$password}', '{$job}', '{$status}')");
                        
                        if($insert === true)
                        {
                            $new_sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE EMAIL = '{$email}'");
                            if(mysqli_num_rows($new_sql) > 0)
                            {
                                $row = mysqli_fetch_assoc($new_sql);
                                $_SESSION["UNIQUE-ID"] = $row["UNIQUE_ID"]; // USER UNIQUE-ID

                                echo "REGISTRATION-DONE";

                                $_POST["user-name"] = null;
                                $_POST["email"] = null;
                                $_POST["password"] = null;
                                $_POST["confirm-password"] = null;
                                $_POST["job"] = null;
                            }
                        }
                        else
                        {
                            echo "REGISTRATION-ERROR";
                        }
                    }
                }
            }
            else
            {
                echo "VAILD-EMAIL-ERROR";
            }
        }
        else
        {
            echo "DATA-ERROR";
        }
    }
?>