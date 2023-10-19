<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       // $regex='/^(77|76|75|78)+[0-9]/';
       //$regex = '/^[a-z]{2,20}$/i';
        if(isset($_POST['test'])){ 
            // $tel = $_POST['tel']; 
            // if(!(preg_match($regex, $tel) || strlen($tel)<9)){
            //     echo 'Num pas Valide';
            // }else{
            //     echo 'Num Valide';
            // }
            //$nom= $_POST['nom'];
            // if(preg_match($regex, $nom)){
            //     echo "Nom invalide";
            // }else{
            //     echo $nom;
            // }
           
            // if(preg_match($regex, $nom)) {
            //     echo $nom;
            // }else{
            //     echo "Nom invalide";
            // }
            $email=$_POST['email'];
            $email1=filter_var($email, FILTER_SANITIZE_EMAIL);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo("$email entrer un mail valide");
              } else {
                echo("$email address mail valide");
              }
           
            
        }
    ?>
    <form action="" method="post">
        <!-- <input type="text" name="tel" id=""> -->
        <!-- <input type="text" name="nom" id=""> -->
        <input type="text" name="email" id="">
        <br>
        <button type="submit" name="test">Test</button>
    </form>
</body>
</html>
