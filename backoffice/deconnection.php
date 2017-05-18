<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 01:30
 */


session_start();
$_SESSION = array();
session_destroy();
header('location: connect_admin.php');