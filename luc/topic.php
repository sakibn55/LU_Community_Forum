<?php

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
                     		 	<thead >
                     		 		<tr>
                        				<th>Posts</th>
                        				<th>Created By</th>
                        				<th>Created at</th>
                     			 	</tr>
                     			 </thead>'; 
                     			echo'<tbody';
					                    echo '<tr>';
					                        echo '<td class="col-sm-8 leftpart">';
                			while($row = mysqli_fetch_array($result))
                				{               
				                    
					                            echo '<h3><a href="topic.php?id=' . $row['post_topic'] . '">' . $row['post_content'] . '</a><h3>';
					                        echo '</td>';
					                        echo '<td class="col-sm-2 rightpart">';
					                            echo $row['user_name'];
					                        echo '</td>';
					                        echo '<td class="col-sm-2 rightpart">';
					                            echo date('d-m-Y', strtotime($row['post_date']));
					                        echo '</td>';
					                    echo '</tr>';
					                    echo'</tbody>';
				                	?>
										
										
											
								</table>
								<?php	
									$sql1 = "SELECT 
									 				reply_post, 
									 				reply_date, 
									 				reply_by,
									 				reply_topic_num 
									 			FROM 
									 				reply 
									 			WHERE 

									 			reply_topic_num= ".$row['post_id'];
															
													         
									$result2 = mysqli_query($conn,$sql1);
											    
								    if(!$result2)
								        {
								       	    echo 'The replies could not be displayed, please try again later.';
									    }
										else{
												?>

												<div class="panel panel-default widget">
										            <div class="panel-heading">
										                <span class="glyphicon glyphicon-comment"></span>
										                <h3 class="panel-title">
										                    Reply</h3>
										            
										            </div>
													<div class="panel-body">
										                <ul class="list-group">
										                    <li class="list-group-item">
										                        <div class="row">
												<?php
												while($row2=mysqli_fetch_array($result2))
												{
													
														
														?>

													
										                            <div class="col-xs-2 col-md-1">
										                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
										                            <div class="col-xs-10 col-md-11">
										                                <div>
										                                    <?php 
										                                    	
										                                    			
										                                    	echo "<p>".$row2['reply_post']."</p>"; 
										                                    			
										                                    ?>
										                                    <div class="mic-info">
										                                        By: 
										                                        <a href="#">

										                                        	<?php echo $row2['reply_by']; ?>
										                                        	
										                                        </a> <?php echo "<p>".$row2['reply_date']."</p> <br>"; ?>
										                                    </div>
										                                </div>										          
										                               									                       										    										      									                              
										                            </div> 
										                            <?php }
										                            ?>

										                        </div>
										                    </li>
													   </ul>  
										            </div>
										        </div>
									
												
												<form class="form " method="post" action="reply.php?id=<?php echo $row['post_id'] ?>">
													<div class="form-group" method="post">
														<textarea class="form-control" id="comment"  name="reply-content" autofocus=""></textarea>
														<input style="float: right;" type="submit" class="btn btn-success" value="Submit reply" />
													</div>
												</form>	
												<?php
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