<?php
    include "../create_user.php";

    $randomizeUsername = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 10);

    $res1 = create_user($randomizeUsername, "aA&1");
    $res2 = create_user($randomizeUsername, "PassWord&isL0nghEn0ugh");

    $res1["code"] == 3 && $res2["code"] == 0    
        ? printf("true")
        : printf("false");