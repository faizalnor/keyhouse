<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    require_once "config.php";
    $request     = json_decode($postdata);

    $pl_id = $request->pl_id;
    $pl_agencyName  =   $request->pl_agencyNames;
    $pl_title  = $request->pl_titles;
    $pl_date = $request->pl_dates;
    $res_name = $request->res_name;
    $res_pos = $request->res_pos;
    $rt_lat = $request->rt_lat;
    $rt_lon = $request->rt_lon;
    $rt_ipAddress = $request->rt_ipAddress;
    $rt_deviceType = $request->rt_deviceType;
    $rt_deviceModel = $request->rt_deviceModel;
    $rt_bahasaRates = $request->rt_bahasaRates;
    $rt_bahanRates = $request->rt_bahanRates;
    $rt_qnaRates = $request->rt_qnaRates;
    $rt_tambahbaikRate = $request->rt_tambahbaikRates;
    $rt_setuju = $request->rt_setuju;
    date_default_timezone_set('UTC');

    // Create a DateTime object and set the timezone to GMT+8
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Asia/Singapore'));

    // Get the current time in GMT+8
    $rt_timestamp = $date->format("H:i:s");
    $rt_date = $date->format("Y-m-d");

    $sql = "INSERT INTO rating_list
    (pl_id, pl_agencyName,pl_title, pl_date,res_name,res_pos,rt_timestamp, rt_date, rt_lat,rt_lon,rt_ipAddress,rt_deviceType,rt_deviceModel,rt_bahasaRate,rt_bahanRate,rt_qnaRate,rt_tambahbaikRate,rt_setuju) VALUES
    ('$pl_id','$pl_agencyName','$pl_title','$pl_date','$res_name','$res_pos','$rt_timestamp','$rt_date', '$rt_lat','$rt_lon','$rt_ipAddress','$rt_deviceType', '$rt_deviceModel', '$rt_bahasaRates', '$rt_bahanRates', '$rt_qnaRates', '$rt_tambahbaikRate','$rt_setuju')";

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
