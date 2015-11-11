<?php
/**
 * Created by PhpStorm.
 * User: shawnotomo
 * Date: 11/9/15
 * Time: 2:46 PM
 */
$conn = mysqli_connect('localhost', 'root', '', 'brewology_users');

$firstName = $_POST['firstName'];

$lastName = $_POST['lastName'];

$username = $_POST['username'];

$email = $_POST['email'];

$password = $_POST['password'];

$passwordConfirm = $_POST['passwordConfirm'];


$output['success'] = false;

// Variable to check

//CHECK FOR PASSWORDS MATCH
if($password != $passwordConfirm){
    $output['message'] = 'Your passwords do not match. Please try again.';
    print json_encode($output);
    exit;
} else{
    //CHECK AND SANITIZE EMAIL
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $output['message'] = "$email is not a valid email address";

        print json_encode($output);

    } else {
        //CHECKING TO SEE IF USER EXISTS BY EMAIL
        $check_email_exist = "SELECT `id` FROM `users` WHERE `email` = '$email'";
        $email_result = mysqli_query($conn, $check_email_exist);
        mysqli_error($conn);
        if(mysqli_num_rows($email_result) > 0) {
            $output['message'] = 'An account for that email already exists.';
            print json_encode($output);

        } else{
            //MAKING SURE FIRST NAME IS NOT ONE LETTER
            if(preg_match('/[a-z]{2,}/', $firstName) == false){
                $output['message'] = 'Sorry, I need more than just a letter.';
                print json_encode($output);

            }else{
                //MAKING SURE LAST NAME IS NOT ONE LETTER
                if(preg_match('/[a-z]{2,}/', $lastName) == false){
                    $output['message'] = 'Your last name cannot be one letter.';
                    print json_encode($output);

                }else{
                    //CHECK THAT USERNAME IS VALID
                    if(preg_match('/^[A-Za-z0-9_-]{3,16}$/', $username) == false){
                        $output['message'] = 'Sorry, that is not a valid username. Note: usernames cannot start with a number.';
                        print json_encode($output);
                    }else{
                        //CHECKING USERNAME ON DATABASE
                        $check_username_exist = "SELECT id FROM `users` WHERE `username` = '$username'";
                        $username_result = mysqli_query($conn, $check_username_exist);
                        if(mysqli_num_rows($email_result) > 0) {
                            $output['message'] = 'That username already exists.';
                            print json_encode($output);

                        } else{
                            $insert_new_user = "INSERT INTO `users` (`email`, `first_name`, `last_name`, `username`, `password`)
											VALUES ('$email', '$firstName', '$lastName', '$username', '$password')";
                            $insert_user_result = mysqli_query($conn, $insert_new_user);
                            if(mysqli_affected_rows($conn) > 0){
                                $output['success'] = true;
                                $output['message'] = "User created!";
                                print json_encode($output);
                                header("Location: http://localhost/lf_projects/sandbox/breweries/brewology/");
                            }
                            else{
                                $output['message'] = "Database error, user not added";
                                print json_encode($output);
                            }
                        }
                    }

                }
            }
        }
    }
}

