<?php

function connection(){
    $mysqlConnect = mysqli_connect("localhost","root","","projweb1");
    //var_dump($mysqlConnect);
    mysqli_set_charset($mysqlConnect, "utf8");

    return $mysqlConnect;
}
