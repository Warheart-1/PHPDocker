<?php
    include "./../change_old_password.php";

    $res1 = change_old_password("Username", "Passworefefzed2&", "Passwordlenght2&test");
    $res2 = change_old_password("Username", "Passwordlenght2&", "Passwordlenght2&test");

    $res1["code"] == 12 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");