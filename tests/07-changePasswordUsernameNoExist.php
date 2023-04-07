<?php
    include "../lib.php";
    
    $res1 =  change_old_password("test", "test", "test");
    $res2 =  change_old_password("Username", "PassWord&isL0nghEn0ugh", "PassW0rd&isL0nghEn0ugh");

    $res1["code"] == 7 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");