<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/13/15
 * Time: 8:54 AM
 */
$conn = mysqli_connect('localhost', 'root', '', 'compiled_breweries');
$id = $_GET['id'];

$name = $_GET['name'];

$breweryDescription = 'This is the description of the brewery. It will go here.';

$addressOne = $_GET['addressOne'];

$addressTwo = $_GET['addressTwo'];

$website = $_GET['website'];

$phone = $_GET['phone'];



include 'phpTemplates/single.php';