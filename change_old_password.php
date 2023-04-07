<?php
    function change_old_password(string $username, string $oldpassword, string $newpassword) {
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 7,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if($oldpassword == "" || $newpassword == ""):
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
            return 0;
        } catch (Exception $e) {
            $errors = array(
                "code" => 13,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }