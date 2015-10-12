<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 10/11/15
 * Time: 4:00 PM
 */
function pullBeerData(){
    $conn = mysqli_connect('localhost', 'root', '', 'ratebeer_data');
    $breweries;

    $breweriesQuery = "SELECT * FROM `ratebeer breweries`";
    $breweryResult = mysqli_query($conn, $breweriesQuery);

    if (mysqli_num_rows($breweryResult) > 0) {
        while ($inner_result = mysqli_fetch_assoc($breweryResult)) {
            $breweries[] = $inner_result;
        }
        echo json_encode($breweries);
    }
}

pullBeerData();

