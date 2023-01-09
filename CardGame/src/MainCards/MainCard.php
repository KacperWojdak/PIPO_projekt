<?php 

namespace Board\MainCards\MainCards;

class MainCard{ 
    private $HP=40;
    private $deck;

    public function CardGame(MainCard $deck){
        $this->deck=$deck;
    }
    public function GetHp(){
        return $this->HP;
    }
    public function  ChangeHP(int $mod){
         $this->HP-=$mod;
    }

}


?>