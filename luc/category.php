<?php
session_start();
include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = " . $_GET['id'];
 
$result = mysqli_query($conn, $sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = ". $_GET['id'];
         
        $result = mysqli_query($conn,$sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table class="table table-bordered">
                	  <thead>
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>
                      </thead>'; 
                     
                while($row = mysqli_fetch_array($result))
                {               
                    echo '
						<tbody>
	                    	<tr>';
	                        echo '<td class="leftpart">';
	                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
	                        echo '</td>';
	                        echo '<td class="rightpart">';
	                            echo date('d-m-Y', strtotime($row['topic_date']));
	                        echo '</td>';
	                    	echo '</tr>
						</tbody>
                    	';
                }
            }
        }
    }
}
 
include 'footer.php';
?>