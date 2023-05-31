
<?php

include('config.php');

$query = "SELECT * FROM client_list ORDER BY cl_name ASC";
$statement = $conn->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	}

	echo json_encode($data);
}
else echo "takda data";
?>
