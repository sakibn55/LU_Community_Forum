<?php
//signin.php

include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lu community forum</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
  </head>

  <?php
 

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo '  <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="jumbotron">
                                    <p>You are allready signed in If you want to <a href="logout.php">Logout</a> you can !! </p>
                                    <button><a href="../index.php">Home</a></button> 
                                </div>   
                            </div>
                        </div>  
                    </div>
            </div>';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        
        echo '<body>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6 col-sm-offset-3">
                               <h2>Sign in</h2>
                                <form class="form form-bordered" method="post" action="">
                                <div class="form-group">
                                    <label>Username:</label> 
                                    <input class="form-control" type="text" name="user_name" />
                                </div>
                                <div class="form-group">
                                    <label>Password: </label>
                                    <input class="form-control" type="password" name="user_pass">
                                </div>
                                <div class="form-group">
                                    <button class=" btn btn-success" type="submit" value="Sign in">Sign in </button>
                                    <a class=" btn btn-success " href="../signup.php">Create a account</a>
                                </div>
                               </form>
                            </div>
                        </div>';
    }
    else
    {
    
        $errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['user_name']))
        {
            $errors[] = 'The username field must not be empty.';
        }
         
        if(!isset($_POST['user_pass']))
        {
            $errors[] = 'The password field must not be empty.';
        }
         
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $sql = "SELECT 
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_name = '" . $_POST['user_name'] . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";
                         
            $result = mysqli_query($conn,$sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please <a href="signin.php">try again</a>';

                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysqli_fetch_array($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
                     
                    echo '<div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="jumbotron">
                                          <h1>Welcome</h1>      
                                          <p>'. $_SESSION['user_name'] . '. <a href="../index.php">Proceed to the forum overview</a>.</p>
                                        </div>   
                                    </div>
                                </div>  
                            </div>
                        </div>';
                }
            }
        }
    }
}
include '../rsc/footer.php';
?>