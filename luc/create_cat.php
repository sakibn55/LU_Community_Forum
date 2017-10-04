<?php
session_start();
//create_cat.php
include 'connect.php';
include('header.php'); 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo '<form class="form-horizontal form form-border" method="post" action="">';

    ?>
        <div class="form-group">
            <label>Category name:</label> 
            <input class="form-control" type="text" name="cat_name" />
        </div>
        <div class="form-group">
            <label for="comment">Category description: </label>
            <textarea class="form-control" id="comment" rows="3" name="cat_description" /></textarea>
            <input type="submit" class="btn btn-success" value="Add category" />
        </div>
     </form>
    <?php
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO
            categories
            (cat_name, cat_description)
        VALUES
            ('".$_POST['cat_name']."',
             '".$_POST['cat_description']."')";

    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error!! this category allready exits';
    }
    else
    {
        echo 'New category successfully added.';
    }
}
 
include('footer.php');
?>