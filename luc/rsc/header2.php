
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
    <link rel="stylesheet" href="css/main.css" type="text/css">
  </head>

  <body>
    <div class="navbar-wrapper">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">LuComForum</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="create_topic.php">Create Topic</a></li>
                <li><a href="create_cat.php">Create Catagories</a></li>
                <li><a href="admin/signin.php">Sign in</a></li>
              </ul>
              <ul class="nav navbar-nav nabar-right">
                <li class="active">
                  <a href="#">Welcome 

                  <?php 

                    if (isset($_SESSION)){
                     echo " " .$_SESSION['user_name']."";
                    }
                    else{
                      
                      echo " Guest";
                    }
                    
                  ?> 
                  </a>

                </li>
              </ul>
            </div>
          </div>
        </nav>
  </div>
<div class="container">
  <div class="row">

    
