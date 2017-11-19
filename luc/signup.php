<?php
//signup.php
include 'admin/connect.php';
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
    <link rel="stylesheet" href="css/main.css">
  </head>
 <body>
 <?php
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '  
    <div class="container">
        
        <div class="row">
             <div class="col-sm-12">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2>Sign up</h2>
                    <form class="form form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Username:</label> 
                            <div class="col-sm-10">
                                <input class="col-sm-10 form-control " type="text" name="user_name" />
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="control-label col-sm-2" for="pwd" id="pwd"> Password: </label>
                            <div class="col-sm-10">
                                <input class="form-control " type="password" name="user_pass">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" id="pwd" for="pwd" >Password again:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="user_pass_check">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-2 ">E-mail:</label>
                            <div class="col-sm-10"> 
                                <input class="form-control" id="email" type="email" name="user_email">
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <input class="btn btn-success" type="submit" value="Register" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        ';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
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
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . $_POST['user_name'] . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . $_POST['user_email'] . "',
                        NOW(),
                        0)";
                         
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}
 
include 'rsc/footer.php';
?>