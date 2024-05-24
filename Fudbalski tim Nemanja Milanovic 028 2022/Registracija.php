<!DOCTYPE html>

<?php
    require_once './db.php';
    $db = new Db();
?>

<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-
Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" 
integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" 
crossorigin="anonymous"></script>



</head>

<script>
        function proveri()
        {
            ime = document.getElementById('ime').value;
            prezime = document.getElementById('prezime').value;
            sifra = document.getElementById('sifra').value;
            username = document.getElementById('username').value;
            
            if(ime == '' || prezime == '' || sifra == ''  || username == '')
                alert('Polja ne mogu biti prazna');
            else
                return false;
        }
    </script>


<body>
    <div class="container">
        <form  method="get">
            <h1>Registracija</h1>
            
            <div class="input-box">
                <input type="text" name = "username" placeholder="username" required />
            </div>

            <div class="input-box">
                <input type="text" name="ime" placeholder="Ime"
                required />
            </div>
            <div class="input-box">
                <input type="text" name="prezime" placeholder="Prezime "
                required />
            </div>

            <div class="input-box">
                <input type="password" name="sifra" placeholder="Sifra"
                required />
            </div>
 
            <div class="remember-forgot">
                <label><input type="checkbox" /> Zapamti me</label>
            </div>
            
            <button type="submit" class="btn" onclick="proveri()">Potvrdi</button>
        </form>


        <?php
            if(isset($_GET['ime']))
            {
                $ime = $_GET['ime'];
                $prezime = $_GET['prezime'];
                $sifra = $_GET['sifra'];
                $username = $_GET['username'];
                
                $provera= $db->registracija($ime, $prezime, $sifra, $username);
                if($provera)
                    header("Location: teams.php");
            }
        ?>
        
        <p class="prijava">Vec imate nalog  <a href="login.php">Prijavite se ovde
    </div>
</body>
</html>