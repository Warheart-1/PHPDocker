<?php
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
        if(strlen($password) < 8 || strlen($password) > 60):
            $errors = array(
                "code" => 2,
                "message" => "Password must be between 8 and 60 characters"
            );
            return $errors; 
        endif;
        if(strlen($name) < 3 || strlen($name) > 20):
            $errors = array(
                "code" => 3,
                "message" => "Username must be between 3 and 20 characters"
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
                "code" => 7,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }