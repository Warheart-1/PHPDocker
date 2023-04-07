<?php
    include "../lib.php";
    
    $res1 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "passwordlenght");
    $res2 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "passwordlenght2");
    $res3 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "PASSWORDLENGHT");
    $res4 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "123456794803");
    $res5 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "passwordlenght2&");
    $res6 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "PASSWORDLENGHT&2");
    $res7 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh245", "Passwordlenght2&");

    $res1["code"] == 11 && $res2["code"] == 11 && $res3["code"] == 11 && $res4["code"] == 11 && $res5["code"] == 11 && $res6["code"] == 11 && $res7["code"] == 0 ?
        printf("true") : 
        printf("false");