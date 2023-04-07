<?php
    include "./../connect_user.php";
    include "./../create_user.php";

    create_user("Lopes", "Passwordlenght2&test");

    $res1 = connect_user("Lopes", "Passwordlenght2&testerez");
    $res2 = connect_user("Lopes", "Passwordlenght2&test");

    $res1["code"] == 15 && $res2["code"] == 0 ?
        printf("true") : 
        printf("false");

    