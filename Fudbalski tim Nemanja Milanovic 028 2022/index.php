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
        function obrisiIgraca(id)
        {
            window.location = "delete.php?id_igraca=" + id;
        }
        
        function izmeniIgraca(id)
        {
            window.location = "edit.php?id_igraca=" + id;
        }
        
        function dodajIgraca()
        {
            window.location = "add.php";
        }
    </script>
    
    <body>
        <h1> <a class="vrh" href="index.php">Igraci</a>
        <a class="vrh" href="teams.php">Timovi</a>
        <a class="vrh" href="utakmice.php">Utakmice</a></h1>
        
        <form class="tabela" method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type='text' placeholder="pretraga" name='search' value='<?php if(isset($_GET['search'])) echo $_GET['search']?>'>
            <input type='submit' value='Pretrazi'>
        </form>
        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $players = $db->getAllPlayers();
            else
                $players = $db->getAllPlayers($_GET['search']);
            
            $table = "<table border='1'>";
            
            $table .= "<tr> <th>Ime</th> <th>Prezime</th> <th>Id tima</th> <th></th> </tr>";

            foreach ($players as $player) 
            {
                $table .= "<tr> <td>" . $player['ime'] . "</td> <td>" . $player['prezime'] . "</td> <td>" . $player['id_tima'] . "</td> <td><input type='button' value='obrisi' onclick='obrisiIgraca(".$player['id'].")'> <input type='button' value='izmeni' onclick='izmeniIgraca(".$player['id'].")'></td> </tr>";
            }
            
            $table .= "</table>";
            
            echo $table;
        ?>
        
        <br>
        <input type='button' name="dodaj" value="Dodaj" onclick="dodajIgraca()">
    </body>
</html>
