<?php
    require_once './db.php';
    $db = new Db();
    
    $id_utakmice = $_GET['id_utakmice'];
    
    if($db->deleteUtakmica($id_utakmice))
        header ("Location: utakmice.php");
    else
        echo "<script> alert('Ne mogu da nadjem utakmicu sa ovim ID-jem.'); window.location.href = 'utakmice.php'; </script>";
?>