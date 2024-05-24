<!DOCTYPE html>



<?php
    require_once './db.php';
    $db = new Db();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="izgled.css">   
        <title></title>
    </head>
    
    <script>
        function obrisiTim(id)
        {
            window.location = "deleteTeam.php?id_tima=" + id;
        }
        
        function izmeniTim(id)
        {
            window.location = "editTeam.php?id_tima=" + id;
        }
        
        function dodajTim()
        {
            window.location = "addTeam.php";
        }
    </script>
    
    <body>
        <h1> <a class="vrh" href="index.php">Igraci</a>
        <a class="vrh" href="teams.php">Timovi</a>
        <a class="vrh" href="utakmice.php">Utakmice</a></h1>
        
        <form class='KLASA_ZA_CSS' method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type='text' placeholder="pretraga" name='search' value='<?php if(isset($_GET['search'])) echo $_GET['search']?>'>
            <input type='submit' value='Pretrazi'>
        </form>
        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $teams = $db->getAllTeams();
            else
                $teams = $db->getAllTeams($_GET['search']);
            
            $table = "<table border='1'>";
            
            $table .= "<tr> <th>Naziv</th> <th>Grad</th> <th></th> </tr>";

            foreach ($teams as $team) 
            {
                $table .= "<tr> <td>" . $team['naziv'] . "</td> <td>" . $team['grad'] . "</td> <td><input type='button' value='obrisi' onclick='obrisiTim(".$team['id'].")'> <input type='button' value='izmeni' onclick='izmeniTim(".$team['id'].")'></td> </tr>";
            }
            
            $table .= "</table>";
            
            echo $table;
        ?>
        
        <br>
        <input type='button' name="dodaj" value="Dodaj" onclick="dodajTim()">
    </body>
</html>
