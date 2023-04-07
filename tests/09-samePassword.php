<?php
    include "../lib.php";
    
    $res1 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh2", "PassW0rd&isL0nghEn0ugh2");
    $res2 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh2", "PassW0rd&isL0nghEn0ugh24");

    $res1["code"] == 9 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");