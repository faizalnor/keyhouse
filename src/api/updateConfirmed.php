<?php
$pid= $_GET['id'];
$getStatus= 'Confirmed';
            
require_once "config.php";
    
$update = "UPDATE bt_customer set status = ? WHERE id = ?";
$stmt= $conn->prepare($update);
$stmt->execute([$getStatus, $pid]);

?>