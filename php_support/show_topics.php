<?php
	/* Show topics belonging to a category on categories.php */

	require 'db_connect.php';

	$category_ID = $_GET['category'];
	$sql = "SELECT 
				topic_name, 
				date_created 
			FROM 
				topics 
			WHERE 
				category_ID = '".$category_ID."'";
	$result = mysqli_query($con,$sql);

	echo "<table id='topics' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Topic</th>
                    <th scope='col'>Created at</th>
                </tr>
            </thead>
            <tbody>";

	while($row = mysqli_fetch_array($result)) {

		$topic_name = $row['topic_name'];
		$date = date('d F Y', strtotime($row['date_created']));
		
	  	echo "<tr>";
	  	echo "<td class='topic'>";
	  	echo "<a href='topic.php?topic=". $topic_name ."'><h3>". $topic_name ."</h3></a>";
	  	echo "</td>";
	  	echo "<td class='date'>".$date."</td>";  
      	echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>