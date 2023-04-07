<?php
include "../lib.php";

$user = "UsernameTest9999";

// Create a temp user
create_user($user, "Passwordlenght2&test");

// Create a temp session
connect_user($user, "Passwordlenght2&test");

// Test
$res1 = delete_user("sdjkbsdjkb-et");
$res2 = delete_user("sdjkb@et");
$res3 = delete_user("sdjkbsdj_et");
$res4 = delete_user("sdjkbsd.et");
$res5 = delete_user("<?= echo 'test'; ?>");
$res6 = delete_user($user);

$res1["code"] == 20 && $res2["code"] == 20 && $res3["code"] == 20 && $res4["code"] == 20 && $res5["code"] == 20 && $res6["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
    ? printf("true")
    : printf("false");
