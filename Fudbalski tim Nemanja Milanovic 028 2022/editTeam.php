<!DOCTYPE html>
<?php
    require_once './db.php';
    $db = new Db();
    $player = $db->getTeamById($_GET['id_tima']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Izmena podataka o timu</h1>
        
        <form method='get' action='<?php $_SERVER['PHP_SELF']; ?>'>
            <input type="hidden" name="id_tima" value="<?php echo $_GET['id_tima'] ?>"><br>
            Naziv: <input type='text' name='naziv' value="<?php echo $player['naziv'] ?>"><br>
            Grad: <input type='text' name='grad' value="<?php echo $player['grad'] ?>"><br>
            <input type='submit' value='Izmeni' ><br>
        </form>
        
        <?php
            if(isset($_GET['naziv']))
            {
                if($db->updateTeam($_GET['id_tima'], $_GET['naziv'], $_GET['grad']))
                        echo "USPESNA IZMENA PODATAKA";
                else
                        echo "NEUSPESNA IZMENA PODATAKA";
            }
        ?>
        
        <a href='teams.php'>Pocetna strana</a>
    </body>
</html>
