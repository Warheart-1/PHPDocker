<?php
    include "../lib.php";
    
    $res1 = change_old_password("", "", "");
    $res2 = change_old_password("Username", "", "");
    $res3 = change_old_password("", "PassW0rd&isL0nghEn0ugh", "");
    $res4 = change_old_password("", "", "PassW0rd&isL0nghEn0ugh2");
    $res4 = change_old_password("Username", "", "PassW0rd&isL0nghEn0ugh2");
    $res5 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh", "");
    $res6 = change_old_password("", "PassW0rd&isL0nghEn0ugh", "PassW0rd&isL0nghEn0ugh2");
    $res7 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh", "PassW0rd&isL0nghEn0ugh2");

    $res1["code"] == 8 && $res2["code"] == 8 && $res3["code"] == 8 && $res4["code"] == 8 && $res5["code"] == 8 && $res6["code"] == 8 && $res7["code"] == 0 ?
        printf("true") : 
        printf("false");
