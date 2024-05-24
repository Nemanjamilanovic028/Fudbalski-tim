<?php
    require_once './db.php';
    $db = new Db();
    
    $id_tima = $_GET['id_tima'];
    
    if($db->deleteTeam($id_tima))
        header ("Location: teams.php");
    else
        echo "<script> alert('Ne mogu da nadjem tim sa ovim ID-jem.'); window.location.href = 'teams.php'; </script>";
?>