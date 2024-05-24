<!DOCTYPE html>
<?php
    require_once './db.php';
    $db = new Db();
    $player = $db->getPlayerById($_GET['id_igraca']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Izmena podataka o igracu</h1>
        
        <form method='get' action='<?php $_SERVER['PHP_SELF']; ?>'>
            <input type="hidden" name="id_igraca" value="<?php echo $_GET['id_igraca'] ?>"><br>
            Ime: <input type='text' name='ime' value="<?php echo $player['ime'] ?>"><br>
            Prezime: <input type='text' name='prezime' value="<?php echo $player['prezime'] ?>"><br>
            Id  tima: <input type='text' name='id_tima' value="<?php echo $player['id_tima'] ?>"><br>
            <input type='submit' value='Izmeni' ><br>
        </form>
        
        <?php
            if(isset($_GET['ime']))
            {
                if($db->updatePlayer($_GET['id_igraca'], $_GET['ime'], $_GET['prezime'], $_GET['id_tima']))
                        echo "USPESNA IZMENA PODATAKA";
                else
                        echo "NEUSPESNA IZMENA PODATAKA";
            }
        ?>
        
        <a href='index.php'>Pocetna strana</a>
    </body>
</html>
