<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inscription.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        include('bd.php');
        global $BD;
        
        if(isset($_POST['inscrire'])){
            $emailConnect=$_POST['email'];
            $passwordConnect=$_POST['password'];
            
            if(empty($_POST['email']) || empty($_POST['password'])){
                echo "Tous les champs sont obligatoires";
            }else{
                $connect="SELECT * FROM utilisateur WHERE email_utilisateur='$emailConnect'AND password_utilisateur='$passwordConnect'";
                $save=$BD->query($connect)->fetch();

                if($save){
                    $_SESSION['email']=$emailConnect;
                    $_SESSION['password']=$passwordConnect;
                    $con="SELECT nom_utilisateur,prenom_utilisateur FROM utilisateur WHERE email_utilisateur='$emailConnect'AND password_utilisateur='$passwordConnect'";
                    $test=$BD->query($con)->fetch();

                    echo "Connexion reussi !😊 Bienvenue ".$test['prenom_utilisateur']."
                    ".$test['nom_utilisateur'];
                }else{
                    echo "email et/ou mot de passe incorrect !😮";
                }
                
            }
        }
    ?>
    <form action="" method="post" class="formulaire">
        <h1>Inscription</h1>
        <h4>Votre chauffeur en un clic !</h4>
        <br>
        <button type="submit" class="facebook">Continuer avec facebook</button>
        <br>
        <br>
        <h4>-----------------------------------OU-----------------------------------</h4>
        <Label>EMAIL</Label>
        <br>
        <br>
        <input type="text" name="email" id="" placeholder="Entre Votre E-mail">
        <br>
        <br>
        <Label>MOT DE PASSE</Label>
        <br>
        <br>
        <input type="password" name="password" id="" placeholder="Entre Votre mot de passe">
        <br>
        <br>
        <div class="aligner">
            <a href="">J'ai deja un compte</a>
            <button type="submit" name="inscrire" class="inscrire">Connecter➡</button>
        </div>
    </form>
</body>
</html>