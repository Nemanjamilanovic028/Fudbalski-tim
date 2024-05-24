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
        function obrisiUtakmicu(id)
        {
            window.location = "deleteUtakmica.php?id_utakmice=" + id;
        }
        
        function izmeniTim(id)
        {
            window.location = "editTeam.php?id_tima=" + id;
        }
        
        function dodajUtakmicu()
        {
            window.location = "addUtakmicu.php";
        }
    </script>
    
    <body>
        <h1><a class="vrh" href="index.php">Igraci</a>
        <a class="vrh" href="teams.php">Timovi</a>
        <a class="vrh" href="utakmice.php">Utakmice</a></h1>
        
        <form class='KLASA_ZA_CSS' method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type='text' placeholder="pretraga" name='search' value='<?php if(isset($_GET['search'])) echo $_GET['search']?>'>
            <input type='submit' value='Pretrazi'>
        </form>
        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $utakmice = $db->getAllUtakmice();
            else
                $utakmice = $db->getAllUtakmice($_GET['search']);
            
            $table = "<table border='1'>";
            
            $table .= "<tr> <th>Naziv tima domacina</th> <th>Naziv tima gosta</th> <th>Golovi domacin</th> <th>Golovi gost</th></tr>";
            
            foreach ($utakmice as $utakmica)
            {
                $table .= "<tr> <td>" . $db->getTeamById($utakmica['id_tima_1'])['naziv'] . 
                "</td> <td>" . $db->getTeamById($utakmica['id_tima_2'])['naziv'] . 
                "</td> <td>" . $utakmica['golovi_1'] . "</td> <td>" . $utakmica['golovi_2'] . 
                "</td> <td><input type='button' value='obrisi' onclick='obrisiUtakmicu(".$utakmica['id'].")'>  </tr>";
            }
            
            $table .= "</table>";
            
            echo $table;
        ?>
        
        <br>
        <input type='button' name="dodaj" value="Dodaj" onclick="dodajUtakmicu()">
    </body>
</html>
