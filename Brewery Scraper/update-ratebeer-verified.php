<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 10/16/15
 * Time: 10:58 AM
 */
$id = $_POST['id'];

$conn = mysqli_connect('localhost', 'root', '', 'ratebeer_data');

$verifyBreweryByID = "UPDATE ratebeer_breweries SET `verified`=1 WHERE `id`='$id'";

$verify_result = mysqli_query($conn, $verifyBreweryByID);
if(mysqli_affected_rows($conn) > 0){
    echo 'Brewery verified. Moving on.';
}
else{
    echo 'Brewery not verified';

}
