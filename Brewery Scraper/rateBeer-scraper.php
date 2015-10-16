<?php

//CURL TIME
function curl($url) {
    $ch = curl_init();  // Initialising cURL
    curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
    $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
    curl_close($ch);    // Closing cURL
    return $data;   // Returning the data from the function
}

function breweryScrape(){

    $breweries = [];
    for ($i = 10; $i < 20; $i++){
        $url = 'http://www.ratebeer.com/brewers/abita-brewing-company/'.$i.'/';
        $breweryInfo = curl($url);
        $name = getName($breweryInfo);
        $address = getAddress($breweryInfo);
        if($name == ''){

        }
        else{
            $data = [
                'name' => $name,
                'address' => $address,
//                'beer' => getBeerList($breweryInfo)
            ];
            array_push($breweries, $data);
            saveData($name, $address);
        }
    }

    echo '<pre>';
        print_r($breweries);
    echo '</pre>';
}

//SAVE BREWERY DATA TO SQL DB
function saveData($breweryName, $address){

    $conn = mysqli_connect('localhost','root','','ratebeer_data');

    $brewery_name = $breweryName;
    $brewery_street = $address['street'];
    $brewery_city = $address['city'];
    $brewery_state = $address['state'];
    $brewery_country = $address['country'];
    $brewery_zip = $address['zipcode'];
    $brewery_phone = $address['telephone'];

    $check_brewery_exist = "SELECT id FROM `ratebeer breweries` WHERE name = '$brewery_name'";
    $brewery_result = mysqli_query($conn, $check_brewery_exist);

	if(mysqli_num_rows($brewery_result) > 0)
    {
        $output['message'] = 'Sorry, that brewery has already been added';
        print json_encode($output);
    }
    else {
        $insert_brewery = "INSERT INTO `ratebeer breweries` (`name`, `city`, `state`, `country`, `zip1`, `phone`)
			VALUES ('$brewery_name', '$brewery_city', '$brewery_state', '$brewery_country', '$brewery_zip', '$brewery_phone')";
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
}

breweryScrape();

//Get names from RateBeer
function getName($str){
    $value = preg_match_all('/<span itemprop=\"name\" class=\"vis\">(.*?)<\/span>/s',$str, $names);
    $name = $names[0][0];
    $name = strip_tags($name);

    return $name;
}
//Get names from RateBeer
function getAddress($str){
    $street = preg_match_all('/<span itemprop=\"streetAddress\">(.*?)<\/span>/s', $str, $streetInfo);
    $city = preg_match_all('/<span itemprop=\"addressLocality\">(.*?)<\/span>/s', $str, $cityInfo);
    $state = preg_match_all('/<span itemprop=\"addressRegion\">(.*?)<\/span>/s', $str, $stateInfo);
    $country = preg_match_all('/<span itemprop=\"addressCountry\">(.*?)<\/span>/s', $str, $countryInfo);
    $postalCode = preg_match_all('/<span itemprop=\"postalCode\">(.*?)<\/span>/s', $str, $zipInfo);
    $telephone = preg_match_all('/<span itemprop=\"telephone\">(.*?)<\/span>/s', $str, $telephoneInfo);
    $Address['street'] = strip_tags($streetInfo[0][0]);
    $Address['city'] = strip_tags($cityInfo[0][0]);
    $Address['state'] = strip_tags($stateInfo[0][0]);
    $Address['country'] = strip_tags($countryInfo[0][0]);
    $Address['zipcode'] = strip_tags($zipInfo[0][0]);
    $telephone = strip_tags($telephoneInfo[0][0]);
    $Address['telephone'] = preg_replace('/\D+/', '', $telephone);

    return $Address;
}

//THIS FUNCTION IS SET UP FOR RATEBEER
function getBeerList($str){
    $info1 = preg_match_all('/<TR class=dataTableRowAlternate>(.*?)<\/TR>/s', $str, $beerInfo);
    $info2 = preg_match_all('/<TR class=>(.*?)<\/TR>/s', $str, $beerInfo2);
    $beerList = [];
    array_push($beerList, $beerInfo[0]);
    array_push($beerList, $beerInfo2[0]);
    return $beerList;
}

//THIS FUNCTION IS SET UP TO ACCESS BEER ADVOCATE
function getMenu($str){
    $str = str_replace(' align="left"', '', $str);
    $str = str_replace(' valign="top"', '', $str);
    $value = preg_match_all('/<td class=\"hr_bottom_light\">(.*?)<\/td>/s',$str, $menuItems);

    $menuItem = [];
    $maxCount = 5;
    $currentCount = 0;
    $listItems = [];
    $group = 0;

    foreach($menuItems[0] as $key => $value){
        $data[$key] = $value;
    }

    foreach($data as $key => $value) {

        switch ($currentCount) {
            case 0:
                $menuItem[$group]['name'] = $value;
                break;

            case 1:
                $menuItem[$group]['type'] = $value;
                break;

            case 2:
                $menuItem[$group]['abv'] = $value;
                break;

            case 3:
                $menuItem[$group]['rating'] = $value;
                break;

            case 4:
                $menuItem[$group]['hads'] = $value;
                break;

            case 5:
                $menuItem[$group]['bros'] = $value;
                break;
        }

        if($currentCount == $maxCount){
            $currentCount = 0;
            $group++;
        }
        else {
            $currentCount++;
        }
    }

//    echo '<pre>';
//    print_r($menuItem);
//    echo '</pre>';

    return $menuItem;
}

