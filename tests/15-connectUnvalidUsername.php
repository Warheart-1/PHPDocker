<?php
    include "../lib.php";
    
    create_user("Lopes", "Passwordlenght2&test");

    $res1 = connect_user("Lopes", "Passwordlenght2&testerez");
    $res2 = connect_user("Lopes", "Passwordlenght2&test");

    $res1["code"] == 15 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");

    