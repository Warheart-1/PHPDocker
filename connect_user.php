<?php
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