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
            id_tima_1 = document.getElementById('id_tima_1').value;
            id_tima_2 = document.getElementById('id_tima_2').value;
            golovi_1 = document.getElementById('golovi_1').value;
            golovi_2 = document.getElementById('golovi_2').value;
            
            if(id_tima_1 == '' || id_tima_2 == '' || golovi_1 == '' || golovi_2 == '')
                alert('Polja ne mogu biti prazna');
            else
                return false;
        }
    </script>
    
    <body>
        <h1>Dodavanje utakmice:</h1>
        <form id="myForm" method="get">
            <br><br>
            Domacin: 
            <select name="id_tima_1" id="team">
                <?php 
                    $teams = $db->getAllTeams();
                    foreach ($teams as $team):
                ?>
                <option value="<?php echo $team['id']; ?>">
                    <?php echo $team['naziv']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            Gost: 
            <select name="id_tima_2" id="team">
                <?php 
                    $teams = $db->getAllTeams();
                    foreach ($teams as $team):
                ?>
                <option value="<?php echo $team['id']; ?>">
                    <?php echo $team['naziv']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <br>
            Golovi domacin: <input type="text" name="golovi_1" id="golovi_1">
            <br><br>
            Golovi gost: <input type="text" name="golovi_2" id="golovi_2">
            <br><br>
            <input type="submit" value="Dodaj" onclick="proveri()">
            <a href="utakmice.php">Pocetna</a>
        </form>
        
        <?php
            if(isset($_GET['id_tima_1']) && isset($_GET['id_tima_2']) && isset($_GET['golovi_1']) && isset($_GET['golovi_2']))
            {
                $id_tima_1 = $_GET['id_tima_1'];
                $id_tima_2 = $_GET['id_tima_2'];
                $golovi_1 = $_GET['golovi_1'];
                $golovi_2 = $_GET['golovi_2'];

                if($id_tima_1 != $id_tima_2)
                {
                    $db->dodajUtakmicu($id_tima_1, $id_tima_2, $golovi_1, $golovi_2);
                    header("Location: utakmice.php");
                }
                else
                    echo "<script>alert('Morate izabrati razlicite timove');</script>";
            }
        ?>
    </body>
</html>
