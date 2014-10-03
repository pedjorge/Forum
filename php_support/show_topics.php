<?php
	/* SELECT FROM DB */
	$category_ID = $_GET['category'];

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql = "SELECT * FROM topics WHERE category_ID = '".$category_ID."'";
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
	  echo "<tr>";
	  echo "<td class='topic'>";
	  echo "<a href='topic.php?topic=". $row['topic_name'] ."'><h3>". $row['topic_name'] ."</h3></a>";
	  echo "</td>";
	  echo "<td class='date'>".date('d F Y', strtotime($row['date_created']))."</td>";  
      echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>