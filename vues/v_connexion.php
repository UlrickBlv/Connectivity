<?php
session_start();
?>
<head>
              <title>Connectivity</title>
              <meta charset= "utf-8">
              <link type="text/css" rel="stylesheet" href="styles/form.css">
              </head>
            
 <div class="connexion">   
    <section class="login">
    <div>
        
<header>
<h2>connexion</h2>
</header>
           
<form method="POST" action="index.php?uc=mini_chat&action=connexion" >
   
   <input id="pseudo" type="text" name="pseudo" placeholder="Pseudo" required="required">
    <input id="mdp" type="password" name="mdp"  placeholder="Mot de Passe" required="required">
   
    <button id="login" type="submit">Login</button>
    <button id="login" type="reset">Reset</button>
    <button id="login" onclick="window.location = 'index.php?uc=mini_chat&action=inscription';"> Ajouter un compte </button>

     
 </form> 
     
 </div>
 </section>
</div>


