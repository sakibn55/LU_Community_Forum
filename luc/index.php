<?php
//create_cat.php
session_start(); 
include 'connect.php';
include 'header.php';

$sql = "SELECT
            cat_id,
            cat_name,
            cat_description

        FROM
            categories";
 
$result = mysqli_query($conn,$sql);

 
$result = mysqli_query($conn, $sql);
if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table
        echo '<table class="table table-hover">
              <thead>
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>
                <thead>'; 
             
        while($row = mysqli_fetch_array($result))
        {               
            echo '<tbody>
                    <tr>';
                echo '<td class="leftpart">';
                ?>
                <h3>
                    <a href="category.php?id=<?php echo $row['cat_id'] ?>"> <?php  echo $row['cat_name'] ?>

                    </a>
                </h3> <?php echo $row['cat_description'];?>

                <?php
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>
            </tbody>';
        }
    }
}
include 'footer.php';
?>