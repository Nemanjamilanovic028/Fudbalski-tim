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
            ime = document.getElementById('ime').value;
            prezime = document.getElementById('prezime').value;
            id_tima = document.getElementById('id_tima').value;
            
            if(ime == '' || prezime == '' || id_tima == '')
                alert('Polja ne mogu biti prazna');
            else if(!Number.isInteger(id_tima))
            {
                alert('Godina mora biti int');
                return false;
            }
            else
                return false;
        }
    </script>
    
    <body>
        <h1 class="dodavanje_igraca">Dodavanje igraca:</h1>
        <form id="myForm" method="get">
            <a class="stranice" href="index.php">Pocetna</a>
            <br><br>    
            <p class="sve">Ime:</p> <input type="text" name="ime" id="ime">
            <br>
            <br>
            <p class="sve">Prezime: </p><input type="text" name="prezime" id="prezime">
            <br><br>
            <p class="sve">Id tima: </p><input type="text" name="id_tima" id="id_tima">
            <br><br>
            <!-- <input type="submit" value="Dodaj" onclick="proveri()"> -->
           <button class="dugme_dodaj" onclick="proveri()">Dodaj </button>
        </form>
        
        <?php
            if(isset($_GET['ime']))
            {
                $ime = $_GET['ime'];
                $prezime = $_GET['prezime'];
                $id_tima = $_GET['id_tima'];
                
                $db->addPlayer($ime, $prezime, $id_tima);
                header("Location: index.php");
            }
        ?>
    </body>
</html>
