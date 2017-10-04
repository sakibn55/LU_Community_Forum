<?php
	session_start();

include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']
$sql = "SELECT
            topic_id,
            topic_subject,
            topic_date
        FROM
            topics
		WHERE
    		topic_id = " . $_GET['id']
            ;
 
$result = mysqli_query($conn, $sql);
 
	if(!$result)
		{
   	 		echo 'The Topic could not be displayed, please try again later.';
		}
	else
	{
   	 	
    	
    		
        		//display category data
        		while($row = mysqli_fetch_array($result))
        		{
            	echo '<h2>Topics in ′' . $row['topic_subject'] . '′ </h2>';
        		}
     
       			 //do a query for the topics
        		$sql = "SELECT
				    posts.post_topic,
				    posts.post_id,
				    posts.post_content,
				    posts.post_date,
				    posts.post_by,
				    users.user_id,
				    users.user_name
				FROM
    				posts
				LEFT JOIN
    				users
				ON
    				posts.post_by = users.user_id
				WHERE
    				posts.post_topic = " . $_GET['id'];
         
        		$result = mysqli_query($conn,$sql);
         
        		if(!$result)
        		{
            		echo 'The topics could not be displayed, please try again later.';
        		}
       			 else
        		{
            		
            		
           				 
                			//prepare the table
                			echo '<table  class="table table-hover">
                     		 	<thead>
                     		 		<tr>
                        				<th>Posts</th>
                        				<th>Created at</th>
                     			 	</tr>
                     			 </thead>'; 
                     
                			while($row = mysqli_fetch_array($result))
                				{               
				                    echo'<tbody>';
					                    echo '<tr>';
					                        echo '<td class="leftpart">';
					                            echo '<h3><a href="topic.php?id=' . $row['post_topic'] . '">' . $row['post_content'] . '</a><h3>';
					                        echo '</td>';
					                        echo '<td class="rightpart">';
					                            echo date('d-m-Y', strtotime($row['post_date']));
					                        echo '</td>';
					                    echo '</tr>';
					                    echo'</tbody>';
				                ?>
										
										
											
								</table>
								<form method="post" action="reply.php?id=<?php echo $row['post_id'] ?>">
										<textarea  name="reply-content"></textarea>
										<input type="submit" value="Submit reply" />
								</form>	
								<?php	
									$sql1 = "SELECT 
									 				reply_post, 
									 				reply_date, 
									 				reply_by,
									 				reply_topic 
									 			FROM 
									 				reply 
									 			WHERE 

									 			reply_topic= ".$row['post_id'];
															
													         
									$result2 = mysqli_query($conn,$sql1);
											    
								    if(!$result2)
								        {
								       	    echo 'The replies could not be displayed, please try again later.';
									    }
										else{
												while($row2=mysqli_fetch_array($result2))
												{
													
														

															echo "<p>".$row2['reply_post']."</p>";
														
						



												}
			}		
                				}
            	}
        	
       
    	
	}
 
	 $sql1 = "SELECT 
	 				reply_post, 
	 				reply_date, 
	 				reply_by,
	 				reply_topic 
	 			FROM 
	 				reply 
	 			WHERE 

	 			reply_topic= ". $_GET['id'];
							
					         
	$result2 = mysqli_query($conn,$sql1);
			    
    if(!$result2)
        {
       	    echo 'The replies could not be displayed, please try again later.';
	    }
		else{
				while($row2=mysqli_fetch_array($result2))
				{
					
						

							echo "<p>".$row2['reply_post']."</p>";
						
						



				}
			}


include 'footer.php';
?>