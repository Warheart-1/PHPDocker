<?php
    include "../lib.php";
    
    $randomizeUsername = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 10);

    $res1 = create_user("Userna,me", "PassWord&isL0nghEn0ugh");
    $res2 = create_user("Usern ame", "PassWord&isL0nghEn0ugh");
    $res3 = create_user("Usern@me", "PassWord&isL0nghEn0ugh");
    $res4 = create_user("Usern#me", "PassWord&isL0nghEn0ugh");
    $res5 = create_user("-Username","PassWord&isL0nghEn0ugh");
    $res6 = create_user("Username-","PassWord&isL0nghEn0ugh");
    $res7 = create_user("-Username-","PassWord&isL0nghEn0ugh");
    $res8 = create_user("user.php","PassWord&isL0nghEn0ugh");
    $res9 = create_user("usernaame","PassWord&isL0nghEn0ugh");
    $res10 = create_user("USERRNAME","PassWord&isL0nghEn0ugh");
    $res11 = create_user("Usern4me","PassWord&isL0nghEn0ugh");
    $res12 = create_user($randomizeUsername,"PassWord&isL0nghEn0ugh");

    $res1["code"] == 4 && $res2["code"] == 4 && $res3["code"] == 4 && $res4["code"] == 4 && $res5["code"] == 4 && $res6["code"] == 4 && $res7["code"] == 4 && $res8["code"] == 4 && $res9["code"] == 0 && $res10["code"] == 0 && $res11["code"] == 0 && $res12["code"] == 0
        ? printf("true")
        : printf("false");

