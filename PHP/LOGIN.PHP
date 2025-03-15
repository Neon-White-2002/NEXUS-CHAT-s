<?php
    @include 'CONFIG.PHP';

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // LOGIN-FORM-DATA:
        $user_name = mysqli_real_escape_string($connection, $_POST["user-name"]);
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $password = md5($_POST["password"]);

        // LET'S CHECK, ALL THE INPUT-FILED:
        if(!empty($user_name) && !empty($email) && !empty($password))
        {
            // LET'S CHECK USER-EMAIL-ADDRESS:
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // SQL-QUERY (TO CHECK USER-DATA):
                $sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE USER_NAME = '{$user_name}' AND EMAIL = '{$email}' AND PASSWORD = '{$password}'");
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);

                    // UPDATE-STATUS (ONLINE OR OFFLINE) :
                    $stauts = "Online";
                    $sql_two = mysqli_query($connection, "UPDATE nexus_user SET STATUS = '{$stauts}' WHERE UNIQUE_ID = {$row['UNIQUE_ID']}");
                    if($sql_two)
                    {
                        $_SESSION["UNIQUE-ID"] = $row["UNIQUE_ID"]; // USER UNIQUE-ID
                        
                        echo "LOGIN-DONE";

                        $_POST["user-name"] = null;
                        $_POST["email"] = null;
                        $_POST["password"] = null;
                    }
                }
                else
                {
                    echo "USER-EXIST-ERROR";
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