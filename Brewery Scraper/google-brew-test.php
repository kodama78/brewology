<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 10/14/15
 * Time: 4:15 PM
 */

$name = $_POST['brewery_name'];
$name = addslashes($name);
$street_number = $_POST['brewery_street_number'];
$street_name = $_POST['brewery_street_name'];
$street_name = addslashes($street_name);
$city = $_POST['brewery_city'];
$state = $_POST['brewery_state'];
$country = $_POST['brewery_country'];
$zip = $_POST['brewery_zip'];
$latitude = $_POST['brewery_latitude'];
$longitude = $_POST['brewery_longitude'];
$phone_num = $_POST['brewery_phone_num'];
$google_id = $_POST['brewery_google_id'];
$international_phone_number = $_POST['brewery_international_phone_number'];
$hours = $_POST['brewery_hours'];
$hours = implode(', ', $hours);
$place_id = $_POST['brewery_place_id'];
$price_level = $_POST['brewery_price_level'];
$brewery_rating = $_POST['brewery_rating'];
$types = $_POST['brewery_types'];
$types = implode(', ', $types);
$google_plus = $_POST['brewery_google_plus'];
$website = $_POST['brewery_website'];

$conn = mysqli_connect('localhost', 'root', '', 'compiled_breweries');

$check_brewery_exist = "SELECT id FROM `oregon_breweries` WHERE name = '$name'";

$brewery_result = mysqli_query($conn, $check_brewery_exist);
if(!$brewery_result || mysqli_num_rows($brewery_result) == 0)
{
    $insert_brewery = "INSERT INTO `oregon_breweries` (`name`, `street number`, `street name`, `city`, `state`, `country`, `zip1`,`latitude`,`longitude`, `phone`, `google id`,`int phone num`,`hours`, `place id`, `price level`, `rating`, `types`, `google_plus`, `website`, `verified`)
    VALUES ('$name', '$street_number', '$street_name', '$city', '$state', '$country', '$zip', '$latitude', '$longitude', '$phone_num', '$google_id', '$international_phone_number', '$hours', '$place_id', '$price_level', '$brewery_rating', '$types', '$google_plus', '$website', '1')
     ON DUPLICATE KEY UPDATE `name`='$name', `street number`='$street_number', `street name`='$street_name', `city`='$city', `state`='$state', `country`='$country', `zip1`='$zip', `latitude`='$latitude', `longitude`='$longitude', `phone`='$phone_num', `google id`='$google_id', `int phone num`='$international_phone_number', `hours`='$hours', `place id`='$place_id', `price level`='$price_level', `rating`='$brewery_rating', `types`='$types', `google_plus`='$google_plus', `website`='$website'";

    $insert_brewery_result = mysqli_query($conn, $insert_brewery);
    if (mysqli_affected_rows($conn) > 0) {
        $output['success'] = true;
        $output['message'] = "brewery added!";
        print json_encode($output);
    } else {
        $output['message'] = "Brewery denied!";
        print json_encode($output);
        echo mysqli_error($conn);
    }

}
else {
    $output['message'] = 'Sorry, that brewery has already been added';
    print json_encode($output);
}
