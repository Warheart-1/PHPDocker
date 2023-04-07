<?php
    include "./../disconnect_user.php";
    include "./../create_user.php";
    include "./../connect_user.php";

    $user = "UsernameTest3434343";

    //create a temp user
    
    create_user($user, "Passwordlenght2&test");

    //Tests
    $res1 = disconnect_user($user);

    //create a temp session
    connect_user($user, "Passwordlenght2&test");

    //Tests
    $res2 = disconnect_user($user);

    $res1["code"] == 26 && $res2["code"] == 0 && !isset($_SESSION["connect"]) && !isset($_SESSION["username"]) && !isset($errors)
        ? printf("true") : 
        printf("false");