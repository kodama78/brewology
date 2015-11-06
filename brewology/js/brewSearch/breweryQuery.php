<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/1/15
 * Time: 7:35 AM
 */
$conn = mysqli_connect('localhost', 'root', '', 'compiled_breweries');

$lat = $_POST['lat'];

$lng = $_POST['lng'];

$radius = $_POST['radius'];


$find_brewery = "
SELECT
`id`, `name`, `latitude`, `longitude`,
ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS($lat ) ) + COS( RADIANS( `latitude` ) )
* COS( RADIANS( $lat )) * COS( RADIANS( `longitude` ) - RADIANS( $lng )) ) * 3959 AS `distance`
FROM `california_breweries`
WHERE
ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( $lat ) ) + COS( RADIANS( `latitude` ) )
    * COS( RADIANS( $lat )) * COS( RADIANS( `longitude` ) - RADIANS( $lng )) ) * 3959 < $radius
ORDER BY `distance`";
$result = mysqli_query($conn, $find_brewery);
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


//SELECT STATEMENT FOR BREWERIES BY DISTANCE QUERY
//SELECT
//`id`,
//`name`,
//ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS($lat ) ) + COS( RADIANS( `latitude` ) )
//    * COS( RADIANS( $lat )) * COS( RADIANS( `longitude` ) - RADIANS( $long )) ) * 3959 AS `distance`
//FROM `california_breweries`
//WHERE
//ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( $lat ) ) + COS( RADIANS( `latitude` ) )
//    * COS( RADIANS( $lat )) * COS( RADIANS( `longitude` ) - RADIANS( $long )) ) * 3959 < 100
//ORDER BY `distance`;