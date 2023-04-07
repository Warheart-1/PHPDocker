<?php
    error_reporting(E_ERROR | E_PARSE);
    include "../lib.php";

    array_map('unlink', array_filter(
        (array) array_merge(glob("./../passwords/*"))));

    $res1=create_user("","PassWord&isL0nghEn0ugh");
    $res2=create_user("Username","");
    $res3=create_user("","");
    $res4=create_user("Username","PassWord&isL0nghEn0ugh");

    $res1["code"] == 1 && $res2["code"] == 1 && $res3["code"] == 1 && $res4["code"] == 0
        ? printf("true")
        : printf("false");