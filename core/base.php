<?php

function con(){
    return mysqli_connect("localhost","root","","contact_web");
}

$url = "http://{$_SERVER['HTTP_HOST']}/web_dev/contact_page_project";

date_default_timezone_set("Asia/Yangon");