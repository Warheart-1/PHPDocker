<?php
    function disconnect_user(string $username) {
        if($username == ""):
            $errors = array(
                "code" => 20,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        $patern = "/^([A-Za-z0-9]){3,20}$/";
        if(!preg_match($patern, $username)):
            $errors = array(
                "code" => 21,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 22,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        try {
            unset($_SESSION["connect"]);
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