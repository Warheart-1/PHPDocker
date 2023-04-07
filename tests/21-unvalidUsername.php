<?php
include "../disconnect_user.php";
include "../connect_user.php";
include "../create_user.php";

$user = "NiceUserName";

// Create a temp user
create_user($user, "Passwordlenght2&test");

// Create a temp session
connect_user($user, "Passwordlenght2&test");

// Test
$res1 = disconnect_user("sdjkbsdjkb-et");
$res2 = disconnect_user("sdjkb@et");
$res3 = disconnect_user("sdjkbsdj_et");
$res4 = disconnect_user("sdjkbsd.et");
$res5 = disconnect_user("<?= echo 'test'; ?>");
$res6 = disconnect_user($user);

$res1["code"] == 21 && $res2["code"] == 21 && $res3["code"] == 21 && $res4["code"] == 21 && $res5["code"] == 21 && $res6["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
    ? printf("true")
    : printf("false");
