<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/10/15
 * Time: 4:37 PM
 */
//session_start();
$conn = mysqli_connect('localhost', 'root', '', 'brewology_users');
$output['success'] = false;

$email = $_POST['email'];

$password = $_POST['password'];

if($email == ''){
    echo 'Please input your email';
}
else
{
    if ($password == '')
    {
        echo 'Please input your password';
    }
    else
    {
        $email_login = "SELECT `id` FROM `users` WHERE `email` = '$email' AND password='$password'";
        $result = mysqli_query($conn, $email_login);
        mysqli_error($conn);
        if(mysqli_num_rows($result) > 0) {
            while($inner_result = mysqli_fetch_assoc($result)){
                print_r($inner_result);
                $output['success'] = true;
                $output['message'] = 'Login successful';
                $_SESSION['user_id'] = $inner_result['id'];
                header("Location: http://localhost/lf_projects/sandbox/breweries/brewology/");
            }
        }
        else {
            echo 'login failed';
            $output['message'] = 'Your email and/or password did not match. Please try again.';
            header("Location: http://google.com");
        }
        echo json_encode($output);
    }
}

