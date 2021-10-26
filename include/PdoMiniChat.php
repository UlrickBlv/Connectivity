<?php

class PdoMiniChat{
    
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=Hello-Design';
    private static $user = 'root';
    private static $mdp = 'root';
    private static $monPdo;
    private static $monPdoChat=null;
    
    
    
    private function __construct(){
        PdoMiniChat::$monPdo = new PDO(PdoMiniChat::$serveur.';'.PdoMiniChat::$bdd, PdoMiniChat::$user, PdoMiniChat::$mdp);
                PdoMiniChat::$monPdo->query("SET CHARACTER SET utf8");
    }
    
    public function __destruct(){
        PdoMiniChat::$monPdo = null;
    }
    
    public static function getMiniChat(){
        if(PdoMiniChat::$monPdoChat==null){
            PdoMiniChat::$monPdoChat = new PdoMiniChat();
            
        }
        return PdoMiniChat::$monPdoChat;
    }
     
 
    public function getInfoUser($pseudo,$mdp){
        $req = "select INSCRIPTION.PSEUDO as PSEUDO , INSCRIPTION.MDP as MDP from INSCRIPTION
                where INSCRIPTION.PSEUDO = '$pseudo' and INSCRIPTION.MDP = '$mdp'";
        $rs = PdoMiniChat::$monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
    
    
    public function insertUser($pseudo,$mdp,$address){
        $req = "INSERT INTO INSCRIPTION VALUES('$pseudo','$mdp','$address')";
        PdoMiniChat::$monPdo->exec($req);
        
    }
    
    public function SelectUser($user){
        $ok = false;
        $req = "SELECT count(PSEUDO) as PSEUDO FROM INSCRIPTION WHERE PSEUDO = '$user'";
        $rs = PdoMiniChat::$monPdo->query($req);
        $ges = $rs->fetch();
        if($ges['PSEUDO'] == 0) {
            $ok = true;
        }
        return $ok;
    }

}
?>

