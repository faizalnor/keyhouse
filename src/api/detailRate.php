<?php
require_once "config.php";

$id=$_GET['id'];

$sql = "SELECT * FROM project_list where pid=$id";
if(!$result = $db->query($sql)){
    die('There was  an error running the query [' . $db->error . ']');
}
$cLS = array();
if ($result->num_rows > 0) {
    while($results = $result -> fetch_assoc())
    {
        $cLS[] = $results;

 } }
print json_encode($cLS);
mysqli_close($db);
?>
