<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Connexion.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('bd.php');
        global $BD;
        $regex='/^(77|76|75|78)+[0-9]/';
        $regexName='/^[a-z]{2,20}$/i';
        
        if(isset($_POST['inscrire'])){
            
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $telephone=$_POST['telephone'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $verif="SELECT * FROM utilisateur WHERE email_utilisateur='$email'";
            $ver=$BD->query($verif)->fetch();
            $verifNum="SELECT * FROM utilisateur WHERE tel_utilisateur='$telephone'";
            $verNum=$BD->query($verifNum)->fetch();
            if(empty($prenom)|| empty($nom) || empty($telephone) || empty($password) || empty($email)){
                echo "Veuillez renseigner tous les champs";
            }elseif(strlen($password)<8){
                echo "Entrer un mot de passe de 8 caracteres au moins";
            }elseif(!(preg_match($regexName, $nom))){
                echo "Nom Invalide !";
            }elseif(!(preg_match($regexName, $prenom))){
                echo "Prenom Invalide !";
            }elseif((!(preg_match('/^[a-zA-Z.+_à0-9]+@[-0-9a-zA-Z.+_]+.[a-z]{2,4}/', $email)))){
                echo "Entrer un email valide";
            }elseif(!(preg_match($regex, $telephone) || strlen($telephone)===9)){
                echo 'Entrer un numero valide';
            }elseif ($ver) {
                echo "Ce mail existe deja choisissez un autre";
            }elseif($verNum){
                echo "Ce numero de telephone existe deja";
            }
            else{
                    $insert="INSERT INTO utilisateur(nom_utilisateur,prenom_utilisateur,email_utilisateur,tel_utilisateur,password_utilisateur) 
                    VALUES('$nom','$prenom','$email','$telephone','$password')";
                    $BD->query($insert);
                    
                    if($insert){
                        echo "Votre Inscription a bien ete pris en compte !";
                    }
     
            }
        }
    ?>
    <form action="" method="post" class="formulaire">
        <h1>Bienvenue</h1>
        <h4>Finaliser votre inscription en renseignant les champs manqunates</h4>
        <br>
        <div class="test">
            <div>
                <Label>PRENOM</Label>
                <br>
                <br>
                <input type="text" name="prenom" id="" placeholder="Entre Votre Prenom" >
            </div>
            <div id="nom">
                <Label >NOM</Label>
                <br>
                <br>
                <input type="text" name="nom" placeholder="Entre Votre Nom" >
            </div>
        </div>
        
        <br>
        <br>
        <div >
            <Label>TELEPHONE</Label>
            <br>
            <input type="text" name="telephone" id="tel" placeholder="Entrer Votre N° Telephone" >
        </div>
        <br>
        <br>
        <div >
            <Label>EMAIL</Label>
            <br>
            <input type="text" name="email" id="email" placeholder="Entrer Votre E-Mail" >
        </div>
        <br>
        <br>
        <div >
            <Label>PASSWORD</Label>
            <br>
            <input type="password" name="password" id="mdp" placeholder="Entrer Votre Mot de passe" >
        </div>
        <br>
        <br>
        <a href="">🎁Ajouter un code promo</a>
        <br>
        <br>
        <button type="submit" name="inscrire" class="inscrire">S'inscrire ➡</button>
       
    </form>
</body>
</html>