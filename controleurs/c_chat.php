<?php


$pdo = PdoMiniChat::getMiniChat();
$key_password = "Guadeloupe";


if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeCo';
}


$action = $_REQUEST['action'];

switch($action){
    
    
    case'connexion':{
        $pseudo = htmlspecialchars($_REQUEST['pseudo']);
        $mdp = htmlspecialchars($_REQUEST['mdp']);
        $encrypted_chaine = openssl_encrypt($mdp, "AES-128-ECB" ,$key_password);
        $user = $pdo->getInfoUser($pseudo,$encrypted_chaine);
        if(!is_array($user) || empty($pseudo) || empty($mdp) ){
            ajouterErreur("Login ou mdp incorrect");
            include("vues/v_erreur.php");
            include("vues/v_connexion.php");
            break;
        }
        else {
            connecter($mdp, $pseudo);
            include ("vues/v_chat.php"); 
            break;
        }
        
    }
  
    case'demandeCo':{
        include("vues/v_connexion.php");
        break;
        
    }
    case'inscription':{
       include("vues/v_inscription.php"); 
        break;
    }
    
    case 'insertU':{
        
        if (isset($_POST['pseudo']) AND isset($_POST['mdp']) AND  isset($_POST['email']))
        {
            if ($_POST['pseudo'] != NULL AND $_POST['mdp'] != NULL AND $_POST['email'] != NULL)
            {
        $pseu = htmlentities($_POST['pseudo']);
        $mdp = htmlentities($_POST['mdp']);
        $mail = htmlentities($_POST['email']);
        
        $us = $pdo->SelectUser($pseu);
        
        $encrypted_chaine = openssl_encrypt($mdp, "AES-128-ECB" ,$key_password);
    

        
        if ($us == true ){
        $pdo->insertUser($pseu,$encrypted_chaine,$mail);
        include("vues/v_connexion.php");
        }
        else {
           /* ajouterErreur("Login déja pris");
            include("vues/v_erreur.php");*/
            echo("User déja dans la BDD");
            include("vues/v_inscription.php");
               
        }
            }
        }
      break;
    }
   
    case'deconnexion':{
            session_destroy();
            include("vues/v_connexion.php");
            break;
        }
    
     default :{
        include("vues/v_connexion.php");
        break;
    }
    
}

?>

