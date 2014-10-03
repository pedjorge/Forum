<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style type="text/css">
table#example {
    border-collapse: collapse;   
}
#example tr {
    background-color: #eee;
    border-top: 1px solid #fff;
}
#example tr:hover {
    background-color: #ccc;
}
#example th {
    background-color: #fff;
}
#example th, #example td {
    padding: 3px 5px;
}
#example td:hover {
    cursor: pointer;
}
	</style>
	<script type="text/javascript">
$(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
	</script>
</head>

<table id="example">
<tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
</tr>
<tr>
    <td><a href="topic.php?topic=Housing Project in Oxford"><h3>Housing Project in Oxford</h3></a></td>
    <td>Apples</td>
    <td>Blah blah blah blah</td>
    <td>10.23</td>
</tr>
<tr>
    <td><a href="bananas">Edit</a></td>
    <td>Bananas</td>
    <td>Blah blah blah blah</td>
    <td>11.45</td>
</tr>
<tr>
    <td><a href="oranges">Edit</a></td>
    <td>Oranges</td>
    <td>Blah blah blah blah</td>
    <td>12.56</td>
</tr>
</table>