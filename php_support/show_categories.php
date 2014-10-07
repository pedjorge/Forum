<?php
	/* Show all categories on the home.php page */

	require 'db_connect.php';
	
	$sql_query_1 = "SELECT 
						category_ID, 
						category_description,
						category_name
					FROM 
						categories
					ORDER BY category_name";
	$result_query_1 = mysqli_query($con,$sql_query_1);

	echo "<table id='categories' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Category</th>
                    <th scope='col'>Last Topic</th>
                </tr>
            </thead>
            <tbody>";

	while($row_query_1 = mysqli_fetch_array($result_query_1)) {

		$sql_query_2 = "SELECT 
							topic_name
						FROM 
							topics
						WHERE 
							category_ID = '".$row_query_1['category_ID']."'
						ORDER BY topic_ID DESC LIMIT 1";
		$result_query_2 = mysqli_query($con,$sql_query_2);
		$row_query_2 = mysqli_fetch_array($result_query_2);

		$last_topic = $row_query_2['topic_name'];
		$category_ID = $row_query_1['category_ID'];
		$category_description = $row_query_1['category_description'];
		$category_name = $row_query_1['category_name'];

	    echo "<tr>";
	    echo "<td class='category'>";
	    echo "<a href='categories.php?category=".$category_ID."'><h3>".$category_name."</h3>";
	    echo "<p>".$category_description."</p></a>";
	    echo "</td>";
	    if ($last_topic == "") {
			echo "<td>";
		    echo "</td>";  
	    }
	    else {
		    echo "<td class='last_topic'>";
		    echo "<a href='topic.php?topic=".$last_topic."'><p>".$last_topic."</p></a>";
		    echo "</td>";  
		}
        echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>