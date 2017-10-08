<?php
include 'connect.php';
include 'header.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {

        //a real user posted a real reply
        $sql = "INSERT INTO 
                    reply(reply_post,
                          reply_date,
                          reply_topic_num,
                          reply_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . $_GET['id'] . ",
                        " . $_SESSION['user_id'] . "
                        
                    )";
                         
        $result = mysqli_query($conn, $sql);

        $r = $_GET['id'];


        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {   
            $sql2="select reply_topic_num
            from 
            reply;";
            $result2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_array($result2);
            
                echo 'Your reply has been saved, check out <a href="topic.php?id=' .$r . '">the topic</a>.';
            
        }
    }
}
 
include 'footer.php';
?>