<?php
	/* Show created topics by current user on the starred topics page */

	require 'db_connect.php';
	
	$sql = "SELECT 
				category_ID,
				category_name,
				category_description
			FROM 
				categories 
			WHERE 
				user_ID = '".$_SESSION['user_ID']."' 
			ORDER BY categories.category_name ASC";
	$result = mysqli_query($con,$sql);

	echo "<table id='categories' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Category</th>
                    <th scope='col' colspan='2'>Description</th>
                </tr>
            </thead>
            <tbody>";

	while($row = mysqli_fetch_array($result)) {
		$category_ID = $row['category_ID'];
		$category_name = $row['category_name'];
		$category_description = $row['category_description'];

	  	echo "<tr id='".$category_ID."'>";
	  	echo "<td class='category_td'>";
	 	echo "<a href='categories.php?category=".$category_ID."'><h3>".$category_name."</h3></a>";
	  	echo "</td>";
	  	echo "<td class='description'>".$category_description."</td>";  
	  	echo "<td class='delete_category_td'><div class='delete_category'><img src='img/delete.png'></div></td>"; 
      	echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>
