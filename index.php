<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="styles/form.css">  
<link rel="icon" type="image/png" href="images/logo1.png" />
<div id="bloc_page">
            <img src="images/logo1.png" alt="Logo_page" width='100px' height='100px'title="Accueil" id="logo"/>
 </div>  
<?php
require_once("include/PdoMiniChat.php");
require_once ("include/fct.php");

session_start();
$pdo = PdoMiniChat::getMiniChat();
$estConnecte = estConnecte();


if(!isset($_REQUEST['uc']) || !$estConnecte){
    $_REQUEST['uc'] = 'mini_chat';
}
$uc = $_REQUEST['uc'];
switch($uc){
case 'mini_chat':{
        include("controleurs/c_chat.php");break;
      
    }
}
?>