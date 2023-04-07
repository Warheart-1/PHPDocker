<?php
    include "../lib.php";
    
    create_user("Axel", "Passwordlenght2&test");

    $res1 = connect_user("", "");
    $res2 = connect_user("Axel", "");
    $res3 = connect_user("", "Passwordlenght2&test");
    $res4 = connect_user("Axel", "Passwordlenght2&test");

    $res1["code"] == 14 && $res2["code"] == 14 && $res3["code"] == 14 && $res4["code"] == 0 ?
        printf("true") : 
        printf("false");
    