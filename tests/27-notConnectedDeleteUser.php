<?php
    include "./../connect_user.php";
    include "./../create_user.php";
    include "./../disconnect_user.php";
    include "./../delete_user.php";

    $user = "JohnTest";
    $user2 = "AxelTest";

    // Create a temp user
    create_user($user, "Passwordlenght2&test");

    // Create a temp session
    connect_user($user, "Passwordlenght2&test");

    disconnect_user($user);

    // Test
    $res1 = delete_user($user);

    // Create a second temp user
    create_user($user2, "Passwordlenght2&test");

    // Create a second temp session
    connect_user($user2, "Passwordlenght2&test");

    // Test
    $res2 = delete_user($user2);
    

    $res1["code"] == 26 && $res2["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
        ? printf("true")
        : printf("false");