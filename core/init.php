<?php
session_start();
error_reporting(1);

date_default_timezone_set('Asia/Kuala_Lumpur');

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

$errors = array();
?>