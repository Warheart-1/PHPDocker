<?php
include "../delete_user.php";
include "../create_user.php";
include "../connect_user.php";

$user = "UsernameTest50001";

// Create a temp user
create_user($user, "Passwordlenght2&test");

// Create a temp session
connect_user($user, "Passwordlenght2&test");

// Test
$res1 = delete_user("");
$res2 = delete_user($user);

$res1["code"] == 23 && $res2["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
    ? printf("true")
    : printf("false");
