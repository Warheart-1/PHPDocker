<?php

    /////////////// CREATE A USER ///////////////

    function create_user(string $name, string $password) {
        if(!file_exists("../passwords")):
            mkdir("../passwords");
        endif;
        if($name == "" || $password == ""):
            $errors = array(
                "code" => 1,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        if(strlen($name) < 3 || strlen($name) > 20):
            $errors = array(
                "code" => 2,
                "message" => "Username must be between 3 and 20 characters"
            );
            return $errors;
        endif;
        if(strlen($password) < 8 || strlen($password) > 60):
            $errors = array(
                "code" => 3,
                "message" => "Password must be between 8 and 60 characters"
            );
            return $errors; 
        endif;
        $patternName = "/^([A-Za-z0-9]){3,20}$/"; 
        if(!preg_match($patternName, $name)) :
            $errors = array(
                "code" => 4,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        $patternPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,60}$/";
        if(!preg_match($patternPassword, $password)):
            $errors = array(
                "code" => 5,
                "message" => "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character and be between 8 and 60 characters"
            );
            return $errors;
        endif;
        try {
            if(file_exists("./../passwords/".$name.".txt")
            && filesize("./../passwords/".$name.".txt") > 0):
                $errors = array(
                    "code" => 6,
                    "message" => "Username already exists"
                );
                return $errors;
            endif;
            $stream = fopen("./../passwords/".$name.".txt", "w");
            fwrite($stream, $password);
            fclose($stream);
            return array(
                "code" => 0,
                "message" => "User created"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 400,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }

    /////////////// LOGIN A USER ///////////////

    function connect_user(string $username, string $password) {
        if(!file_exists("../passwords/".$username.".txt") && $username != "" && $password != ""):
            $errors = array(
                "code" => 13,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if($password == "" || $username == ""):
            $errors = array(
                "code" => 14,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        try {
            $stream = fopen("./../passwords/".$username.".txt", "r");
            $passwordFile = fread($stream, filesize("./../passwords/".$username.".txt"));
            fclose($stream);
            if($password != $passwordFile):
                $errors = array(
                    "code" => 15,
                    "message" => "Wrong password"
                );
                return $errors;
            endif;
            session_start();
            $_SESSION["connect"] = 42;
            $_SESSION["username"] = $username;
            return array(
                "code" => 0,
                "message" => "User connected"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 400,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }

    /////////////// LOGOUT A USER ///////////////

    function disconnect_user(string $username) {
        if($username == ""):
            $errors = array(
                "code" => 16,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        $patern = "/^([A-Za-z0-9]){3,20}$/";
        if(!preg_match($patern, $username)):
            $errors = array(
                "code" => 17,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 18,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if(!isset($_SESSION["connect"]) || $_SESSION["username"] != $username):
            $errors = array(
                "code" => 22,
                "message" => "User is not connected"
            );
            return $errors;
        endif;
        try {
            unset($_SESSION["connect"]);
            unset($_SESSION["username"]);
            session_destroy();
            return array(
                "code" => 0,
                "message" => "User disconnected"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 400,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }

    /////////////// DELETE A USER ///////////////

    function delete_user(string $username) {
        if($username == ""):
            $errors = array(
                "code" => 19,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        $patern = "/^([A-Za-z0-9]){3,20}$/";
        if(!preg_match($patern, $username)):
            $errors = array(
                "code" => 20,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 21,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if(!isset($_SESSION["connect"]) || $_SESSION["username"] !== $username):
            $errors = array(
                "code" => 23,
                "message" => "User is not connected"
            );
            return $errors;
        endif;
        if(isset($_SESSION["connect"]) && $_SESSION["username"] == $username):
            unset($_SESSION["connect"]);
            unset($_SESSION["username"]);
        endif;
        try {
            unlink("../passwords/".$username.".txt");
            return array(
                "code" => 0,
                "message" => "User deleted"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 400,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }

    /////////////// CHANGE A USER PASSWORD ///////////////

    function change_old_password(string $username, string $oldpassword, string $newpassword) {
        if(!file_exists("../passwords/".$username.".txt") && $username !== ""):
            $errors = array(
                "code" => 7,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if($oldpassword == "" || $newpassword == "" || $username == ""):
            $errors = array(
                "code" => 8,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        if($newpassword == $oldpassword):
            $errors = array(
                "code" => 9,
                "message" => "New password must be different from old password"
            );
            return $errors;
        endif;
        if(strlen($newpassword) < 8 || strlen($newpassword) > 60):
            $errors = array(
                "code" => 10,
                "message" => "Password must be between 8 and 60 characters"
            );
            return $errors;
        endif;
        $patternPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,60}$/";
        if(!preg_match($patternPassword, $newpassword)):
            $errors = array(
                "code" => 11,
                "message" => "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character and be between 8 and 60 characters"
            );
            return $errors;
        endif;
        try {
            $stream = fopen("./../passwords/".$username.".txt", "r");
            $password = fread($stream, filesize("./../passwords/".$username.".txt"));
            fclose($stream);
            if($password != $oldpassword):
                $errors = array(
                    "code" => 12,
                    "message" => "Old password is incorrect"
                );
                return $errors;
            endif;
            $stream = fopen("./../passwords/".$username.".txt", "w");
            fwrite($stream, $newpassword);
            fclose($stream);
            return array(
                "code" => 0,
                "message" => "Password changed"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 400,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }