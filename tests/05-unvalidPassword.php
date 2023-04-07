<?php
    include "../create_user.php";

    $randomizeUsername = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 10);

    $res1 = create_user($randomizeUsername, "passworde");
    $res2 = create_user($randomizeUsername, "PASSWORDED");
    $res3 = create_user($randomizeUsername, "p4ssw0rde&");
    $res4 = create_user($randomizeUsername, "PassWord&isL0nghEn0ugh");

    $res1["code"] == 5 && $res2["code"] == 5 && $res3["code"] == 5 && $res4["code"] == 0
        ? printf("true")
        : printf("false");