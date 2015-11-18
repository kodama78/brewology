<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/10/15
 * Time: 4:37 PM
 */
//session_start();
$conn = mysqli_connect('localhost', 'root', '', 'brewology');
$output['success'] = false;

$email = $_POST['email'];

$password = $_POST['password'];
//WILL NEED TO SANITIZE EMAIL AND PASSWORD


$email_login = "SELECT `id` FROM `users` WHERE `email` = '$email' AND password='$password'";
$result = mysqli_query($conn, $email_login);
mysqli_error($conn);
if(mysqli_num_rows($result) > 0) {
    while($inner_result = mysqli_fetch_assoc($result)){
//                session_start();
        $output['success'] = true;
        $output['message'] = 'Login successful';
//                $_SESSION['id'] = $inner_result['id'];
        $user_id = $inner_result['id'];
        //going to make ajax call here to user favorites
        $userFavorites = "SELECT * FROM `user_favorites` WHERE `cb` = '$user_id'";
        $returnedFaves = mysqli_query($conn, $userFavorites);
        if(@mysqli_num_rows($userFavorites) > 0){
            while($favoritesResult = mysqli_fetch_assoc($returnedFaves)){
                $output['favorites'] = $favoritesResult;
            }
        }else{
            $output['favorites'] = [];
        }
    }
}
else {
    $output['message'] = 'Your email and/or password did not match. Please try again.';
}
echo json_encode($output);



