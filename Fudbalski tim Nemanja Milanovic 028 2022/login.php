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
        function login()
        {
            username = document.getElementById('username').value;
            sifra = document.getElementById('sifra').value;
    
            
            if(username == '' || sifra == '' )
                alert('Polja ne mogu biti prazna');
            else
                return false;
        }
    </script>


<body>
    <div class="container">
        <form action="#">
            <h1>Prijavite se</h1>

            <div class="input-box">
                <input type="text" name="username"  placeholder="username"
                required />
            </div>

            <div class="input-box">
                <input type="password" name="sifra" placeholder="Sifra"
                required />
            </div>
 
<div class="remember-forgot">
<label><input type="checkbox" /> Zapamti me</label>


</div>
    <button type="submit" class="btn"  onclick="login()">Prijavite se</button>

    <div class="register-link">
        <p>Nemate profil?  <a href="Registracija.php">Registrujte se ovde

        </a></p>
    </div>

        </form>

        <?php
            if(isset($_GET['username']))
            {
               
                $sifra = $_GET['sifra'];
                $username = $_GET['username'];
                
                $vraca=$db->login($username, $sifra);
                if($vraca==1)
                    header("Location: teams.php");
            }
        ?>

    </div>











</body>
</html>