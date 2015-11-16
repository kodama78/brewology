<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/13/15
 * Time: 8:54 AM
 */
$conn = mysqli_connect('localhost', 'root', '', 'brewology');

$id = $_GET['id'];

$name;

$breweryDescription = 'This is the description of the brewery. It will go here.';

$addressOne;

$addressTwo;

$website;

$phone;

$breweryInfo = "SELECT `name`, `street number`, `street name`, `city`,`state`, `zip1`, `latitude`, `longitude`, `phone`, `rating`, `website`
                FROM `breweries` WHERE `id`='$id'";
$result = mysqli_query($conn, $breweryInfo);
mysqli_error($conn);


if (mysqli_num_rows($result) > 0) {
    while ($inner_result = mysqli_fetch_assoc($result)) {

        $brewery = $inner_result;
        $name=$brewery['name'];
        $addressOne = $brewery['street number'].' '.$brewery['street name'];
        $addressTwo =  $brewery['city']. ', '.$brewery['state']. ' '.$brewery['zip1'];
        $website = $brewery['website'];
        $phone = $brewery['phone'];
    }
}
else{
    echo 'No breweries in that area code';
}

include 'phpTemplates/single.php';