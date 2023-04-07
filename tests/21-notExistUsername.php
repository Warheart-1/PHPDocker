<?php
include "../lib.php";

$user = "UsernameTest55555";

// Create a temp user
create_user($user, "Passwordlenght2&test");

// Create a temp session
connect_user($user, "Passwordlenght2&test");

// Test
$res1 = delete_user("9z9z9z9z9z9z9z9z9");
$res2 = delete_user($user);

$res1["code"] == 21 && $res2["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
    ? printf("true")
    : printf("false");
