<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 10/11/15
 * Time: 6:12 PM
 */


//echo "VALUES ('$name', '$street_number', '$street_name', '$city', '$state', '$country', '$zip', '$latitude', '$longitude', '$phone_num', '$google_id', '$international_phone_number', '$hours', '$place_id', '$types', '$google_plus', '$website')";

$mysqli = new mysqli('localhost', 'root', '', 'compiledBreweries');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare("INSERT INTO placesBreweries VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssssssssssssssssi', $name, $street_number, $street_name, $city, $state, $country, $zip, $latitude, $longitude, $phone_num, $google_id, $international_phone_number, $hours, $place_id, $brewery_rating, $types, $google_plus, $website, $verified);

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
$google_id = $_POST['brewery_google_id'];
$international_phone_number = $_POST['brewery_international_phone_number'];
$hours = $_POST['brewery_hours'];
$place_id = $_POST['brewery_place_id'];
$brewery_rating = $_POST['brewery_rating'];
$types = $_POST['brewery_types'];
$google_plus = $_POST['brewery_google_plus'];
$website = $_POST['brewery_website'];
$verified = 1;

/* execute prepared statement */
$stmt->execute();
printf("%d Row inserted. Brewery not added\n", $stmt->affected_rows);

/* close statement and connection */
$stmt->close();

/* Clean up table CountryLanguage */
//$mysqli->query("DELETE FROM CountryLanguage WHERE Language='Bavarian'");
//printf("%d Row deleted.\n", $mysqli->affected_rows);

/* close connection */
$mysqli->close();


//$conn = mysqli_connect('localhost', 'root', '', 'finished compiled breweries');
//$check_brewery_exist = "SELECT id FROM `google places breweries` WHERE name = '$name'";
//$brewery_result = mysqli_query($conn, $check_brewery_exist);
//print mysqli_num_rows($brewery_result);
//if(mysqli_num_rows($brewery_result) > 0)
//{
//    $output['message'] = 'Sorry, that brewery has already been added';
//    print json_encode($output);
//}
//else{
//    $insert_brewery = "INSERT INTO `google places breweries` (`name`, `street number`, `street name`, `city`, `state`, `country`, `zip1`,`latitude`,`longitude`, `phone`, `google id`,`int phone num`,`hours`, `place id`, `types`, `google_plus`, `website`, `verified`)
////    VALUES ('$name', '$street_number', '$street_name', '$city', '$state', '$country', '$zip', '$latitude', '$longitude', '$phone_num', '$google_id', '$international_phone_number', '$hours', '$place_id', '$types', '$google_plus', '$website', '1')";
//    $insert_brewery_result = mysqli_query($conn, $insert_brewery);
//    if (mysqli_affected_rows($conn) > 0) {
//        $output['success'] = true;
//        $output['message'] = "brewery added!";
//        print json_encode($output);
//    } else {
//        $output['message'] = "Brewery denied!";
//        print json_encode($output);
//    }
//$sql = "UPDATE `google places breweries` SET `name`=?, `street number`=?, street_name=?, city=?, state=?, country=?, zip1=?, latitude=?, longitude=?, phone=?, google id=?, int phone num=?, hours=?, place id=?, price level=?, rating=?, types=?, google_plus=?, website=?, verified=? WHERE account_id=?";
//
//$stmt = $db_usag->prepare($sql);
//
//// This assumes the date and account_id parameters are integers `d` and the rest are strings `s`
//// So that's 5 consecutive string params and then 4 integer params
//
//$stmt->bind_param('sssssssssssssssssssss', $phone_number, $street_number, $street_name, $city, $state, $country, $zip, $latitude, $longitude, $phone_num, $google_id, $international_phone_number, $hours, $place_id, $brewery_price_level, $brewery_rating, $types, $google_plus, $account_id);
//$stmt->execute();
//
//if ($stmt->errno) {
//    echo "FAILURE!!! " . $stmt->error;
//}
//else echo "Updated {$stmt->affected_rows} rows";
//
//$stmt->close();



//
//
//if(mysqli_num_rows($brewery_result) > 0)
//{
//    $output['message'] = 'Sorry, that brewery has been added';
//    print json_encode($output);
//}
//else {
//    $insert_brewery = "INSERT INTO `google places breweries` (`name`, `street number`, `street name`, `city`, `state`, `country`, `zip1`,`latitude`,`longitude`, `phone`, `google id`,`int phone num`,`hours`, `place id`, `types`, `google_plus`, `website`, `verified`)
//    VALUES ('$name', '$street_number', '$street_name', '$city', '$state', '$country', '$zip', '$latitude', '$longitude', '$phone_num', '$google_id', '$international_phone_number', '$hours', '$place_id', '$types', '$google_plus', '$website', '1')";
//    $insert_brewery_result = mysqli_query($conn, $insert_brewery);
//    if (mysqli_affected_rows($conn) > 0) {
//        $output['success'] = true;
//        $output['message'] = "brewery added!";
//        print json_encode($output);
//    } else {
//        $output['message'] = "Brewery denied!";
//        print json_encode($output);
//    }
//}


