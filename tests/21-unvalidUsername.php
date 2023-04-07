<?php
include "../disconnect_user.php";

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

// Create a temp session
$_SESSION["connect"] = 42;

// Test
$res1 = disconnect_user("sdjkbsdjkb-et");
$res2 = disconnect_user("sdjkb@et");
$res3 = disconnect_user("sdjkbsdj_et");
$res4 = disconnect_user("sdjkbsd.et");
$res5 = disconnect_user("<?= echo 'test'; ?>");
$res6 = disconnect_user($randomizeUsername);

$res1["code"] == 21 && $res2["code"] == 21 && $res3["code"] == 21 && $res4["code"] == 21 && $res5["code"] == 21 && $res6["code"] == 0
    ? printf("true")
    : printf("false");
