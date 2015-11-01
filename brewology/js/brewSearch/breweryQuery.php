<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/1/15
 * Time: 7:35 AM
 */
$conn = mysqli_connect('localhost', 'root', '', 'compiled_breweries');

$location = $_POST['location'];

$find_breweries = "SELECT * FROM `california_breweries` WHERE zip1 = '$location'";
$result = mysqli_query($conn, $find_breweries);
mysqli_error($conn);

if (mysqli_num_rows($result) > 0) {
    while ($inner_result = mysqli_fetch_assoc($result)) {
        $breweries[] = $inner_result;
    }
    echo json_encode($breweries);
}
else{
    echo 'No breweries in that area code';
}