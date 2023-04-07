<?php
include "../delete_user.php";

$randomizeUsername = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 10);

// Create a temp user
if (
    file_exists("./../passwords/" . $randomizeUsername . ".txt")
    && filesize("./../passwords/" . $randomizeUsername . ".txt") > 0
) :
    $errors = array(
        "code" => 6,
        "message" => "Username already exists"
    );
    return $errors;
endif;
$stream = fopen("./../passwords/" . $randomizeUsername . ".txt", "w");
fwrite($stream, 'tempPassword');
fclose($stream);

// Test
$res1 = delete_user("9z9z9z9z9z9z9z9z9");
$res2 = delete_user($randomizeUsername);

$res1["code"] == 25 && $res2["code"] == 0
    ? printf("true")
    : printf("false");
