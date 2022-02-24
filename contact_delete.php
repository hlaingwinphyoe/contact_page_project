<?php

require_once "core/base.php";
require_once "core/functions.php";

$id = $_GET['id'];

if (contactDelete($id)){
    header("location:index.php");
}