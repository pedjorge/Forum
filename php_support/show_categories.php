<?php
	/* SELECT FROM DB */
	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($con,$sql);

	echo "<table id='categories' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Category</th>
                    <th scope='col'>Last Topic</th>
                </tr>
            </thead>
            <tbody>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td class='category'>";
	  echo "<a href='categories.php?category=". $row['category_ID'] ."'><h3>". $row['category_name'] ."</h3>";
	  echo "<p>". $row['category_description'] ."</p></a>";
	  echo "</td>";
	  echo "<td class='last_topic'>...</td>";  
      echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>