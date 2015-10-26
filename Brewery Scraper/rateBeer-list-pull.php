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

    $breweriesQuery = "SELECT * FROM `ratebeer_breweries` WHERE `verified`=0 AND `state`='Arizona' LIMIT 1";
    $breweryResult = mysqli_query($conn, $breweriesQuery);
    mysqli_error($conn);

    if (mysqli_num_rows($breweryResult) > 0) {
        while ($inner_result = mysqli_fetch_assoc($breweryResult)) {
            $breweries[] = $inner_result;
        }
        echo json_encode($breweries);
    }
    else{
        echo 'All breweries have been verified';
    }
}

pullBeerData();

