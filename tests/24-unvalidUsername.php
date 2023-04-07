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
$res1 = delete_user("sdjkbsdjkb-et");
$res2 = delete_user("sdjkb@et");
$res3 = delete_user("sdjkbsdj_et");
$res4 = delete_user("sdjkbsd.et");
$res5 = delete_user("<?= echo 'test'; ?>");
$res6 = delete_user($randomizeUsername);

$res1["code"] == 24 && $res2["code"] == 24 && $res3["code"] == 24 && $res4["code"] == 24 && $res5["code"] == 24 && $res6["code"] == 0
    ? printf("true")
    : printf("false");
