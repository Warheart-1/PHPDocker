<?php
include "../disconnect_user.php";
include "../connect_user.php";
include "../create_user.php";

$user = "UsernameTest500";

// Create a temp user
create_user($user, "Passwordlenght2&test");

// Create a temp session
connect_user($user, "Passwordlenght2&test");

// Test
$res1 = disconnect_user("9z9z9z9z9z9z9z9z9");
$res2 = disconnect_user($user);

$res1["code"] == 22 && $res2["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
    ? printf("true")
    : printf("false");
