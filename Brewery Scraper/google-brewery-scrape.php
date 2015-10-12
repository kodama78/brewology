<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 10/11/15
 * Time: 6:12 PM
 */
$name = $_POST['brewery_name'];
$street_number = $_POST['brewery_street_number'];
$street_name = $_POST['brewery_street_name'];
$city = $_POST['brewery_city'];
$state = $_POST['brewery_state'];
$country = $_POST['brewery_country'];
$zip = $_POST['brewery_zip'];
$latitude = $_POST['brewery_latitude'];
$longitude = $_POST['brewery_longitude'];
$phone_num = $_POST['brewery_phone_num'];
$phone_num = strip_tags($phone_num);
$google_id = $_POST['brewery_google_id'];
$international_phone_number = $_POST['brewery_international_phone_number'];
$hours = $_POST['brewery_hours'];
$hours = implode(",", $hours);
$place_id = $_POST['brewery_place_id'];
$brewery_price_level = $_POST['brewery_price_level'];
$brewery_rating = $_POST['brewery_rating'];
$types = $_POST['brewery_types'];
$types = implode(",", $types);
$google_plus = $_POST['brewery_google_plus'];
$website = $_POST['brewery_website'];


$conn = mysqli_connect('localhost', 'root', '', 'finished compiled breweries');
$check_brewery_exist = "SELECT id FROM `google places breweries` WHERE name = '$name'";
$brewery_result = mysqli_query($conn, $check_brewery_exist);

if(mysqli_num_rows($brewery_result) > 0)
{
    $output['message'] = 'Sorry, that brewery has been added';
    print json_encode($output);
}
else {
    $insert_brewery = "INSERT INTO `google places breweries` (`name`, `street number`, `street name`, `city`, `state`, `country`, `zip1`,`latitude`,`longitude`, `phone`, `google id`,`int phone num`,`hours`, `place id`, `types`, `google_plus`, `website`, `verified`)
    VALUES ('$name', '$street_number', '$street_name', '$city', '$state', '$country', '$zip', '$latitude', '$longitude', '$phone_num', '$google_id', '$international_phone_number', '$hours', '$place_id', '$types', '$google_plus', '$website', '1')";
    $insert_brewery_result = mysqli_query($conn, $insert_brewery);
    if (mysqli_affected_rows($conn) > 0) {
        $output['success'] = true;
        $output['message'] = "brewery added!";
        print json_encode($output);
    } else {
        $output['message'] = "Brewery denied!";
        print json_encode($output);
    }
}
