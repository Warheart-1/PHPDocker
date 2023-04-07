<?php
    include "../lib.php";
    
    $res1 = connect_user("Usernamedzdsd", "Passwordlenght2&test");
    $res2 = connect_user("Username", "Passwordlenght2&test");

    $res1["code"] == 13 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");

    