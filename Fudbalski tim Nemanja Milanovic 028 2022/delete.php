<?php
    require_once './db.php';
    $db = new Db();
    
    $id_igraca = $_GET['id_igraca'];
    
    if($db->deletePlayer($id_igraca))
        header ("Location: index.php");
    else
        echo "<script> alert('Ne mogu da nadjem igraca sa ovim ID-jem.'); window.location.href = 'index.php'; </script>";
?>