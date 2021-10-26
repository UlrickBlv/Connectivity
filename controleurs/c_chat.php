<?php


$pdo = PdoMiniChat::getMiniChat();

if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeCo';
}


$action = $_REQUEST['action'];

switch($action){
    
    case'verify':{ 
     include("vues/v_verify.php");
     break;
    }
    
    case'connexion':{
        $pseudo = $_REQUEST['pseudo'];
        $mdp = $_REQUEST['mdp'];
        $user = $pdo->getInfoUser($pseudo,$mdp);
        if(!is_array($user) || empty($pseudo) || empty($mdp) ){
            ajouterErreur("Login ou mdp incorrect");
            include("vues/v_erreur.php");
            include("vues/v_connexion.php");
            break;
        }
        else {
            //ob_start();
            connecter($mdp, $pseudo);
            include ("vues/v_chat.php");
            //$action = "affiche";
            //header('Refresh: 0;URL=index.php?uc=mini_chat&action=affiche');
            //ob_enf_flush();
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
        
        if ($us == true ){
        $pdo->insertUser($pseu,$mdp,$mail);
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
    
    
  
    
    
    case'pdf':{
        $adr = $_SERVER['REMOTE_ADDR'];
        $pseu2 =  $_SESSION['PSEUDO'];
        $mdp2 =  $_SESSION['MDP'];
        $ipAll = $pdo->getInfoAllUser();
        //$pdo->getInfoAllUser()
        include('vues/pdf.php');
        
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

