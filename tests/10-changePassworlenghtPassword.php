<?php
    include "../lib.php";
    
    $res1 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh24", "aA&1");
    $res2 = change_old_password("Username", "PassW0rd&isL0nghEn0ugh24", "PassW0rd&isL0nghEn0ugh245");

    $res1["code"] == 10 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");