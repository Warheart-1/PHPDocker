<?php
    function connect_user(string $username, string $password) {
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 14,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if($password == "" || $username == ""):
            $errors = array(
                "code" => 15,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        $patern = "/^([A-Za-z0-9]){3,20}$/";
        if(!preg_match($patern, $username)):
            $errors = array(
                "code" => 16,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        $patern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,60}$/";
        if(!preg_match($patern, $password)):
            $errors = array(
                "code" => 17,
                "message" => "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character and be between 8 and 60 characters"
            );
            return $errors;
        endif;
        try {
            $stream = fopen("./../passwords/".$username.".txt", "r");
            $passwordFile = fread($stream, filesize("./../passwords/".$username.".txt"));
            fclose($stream);
            if($password != $passwordFile):
                $errors = array(
                    "code" => 18,
                    "message" => "Wrong password"
                );
                return $errors;
            endif;
            $_SESSION["connect"] = 42;
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