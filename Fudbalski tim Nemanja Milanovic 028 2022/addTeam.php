<!DOCTYPE html>

<?php
    require_once './db.php';
    $db = new Db();
?>

<html>
    <head>
    <link rel="stylesheet" href="izgled.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <script>
        function proveri()
        {
            naziv = document.getElementById('naziv').value;
            grad = document.getElementById('grad').value;
            
            if(naziv == '' || grad == '')
                alert('Polja ne mogu biti prazna');
            else
                return false;
        }
    </script>
    
    <body>
        <h1 class="dod_tim">Dodavanje tima:</h1>
        <form id="myForm" method="get">
            <a class="poc" href="index.php">Pocetna</a>
            <br><br>
            Naziv: <input type="text" name="naziv" id="naziv">
            <br><br>Grad: <input type="text" name="grad" id="grad">
            <br><br><input class="dodaj" type="submit" value="Dodaj" onclick="proveri()">
            
        </form>
        
        <?php
            if(isset($_GET['naziv']))
            {
                $naziv = $_GET['naziv'];
                $grad = $_GET['grad'];
                
                $db->addTeam($naziv, $grad);
                header("Location: teams.php");
            }
        ?>
    </body>
</html>
