<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    require_once "config.php";
    $request     = json_decode($postdata);
    $pl_agencyName  =   $request->pl_agencyNames;
    $pl_title  = $request->pl_titles;
    $pl_date = $request->pl_dates;


    $sql = "INSERT INTO project_list
    (pl_agencyName,pl_title, pl_date) VALUES
    ('$pl_agencyName','$pl_title', '$pl_date')";

     if($db->query($sql)==TRUE){

      $last_id = $db->insert_id;

      echo $last_id;

     }
    else {
       printf("Errormessage: %s\n", $db->error);
    }
}
mysqli_close($db);
?>
