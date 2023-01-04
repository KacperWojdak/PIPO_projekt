<?php

namespace Battle;

use Exception;

/////////////////////////////////////////       INNE                  ////////////////////////////////////////////////////////////
final class Log {

    public static function info(string $message = ""): void {
        echo $message .  PHP_EOL;
    }
}


class WinnerWasCalled extends Exception{}
/////////////////////////////////////////////////         MAIN CARDS             //////////////////////////////////////////////////////////////
class MainCard{ 
    private int $HP=40;
    private $deck;
    private  $name;
    public function CardGame(MainCard $deck){
        $this->deck=$deck;
    }
    public function GetHp(){
        return $this->HP;
    }
    public function GetName(){
        return $this->name;
    }
    public function  ChangeHP(int $mod){
         $this->HP=$this->HP-$mod;
    }

}


interface PlayerInterface {

	public function GetPassive(): int;



}
class PlayerCardFire extends MainCard implements PlayerInterface{
    private $name="Fire";
    public function GetPassive(): int{
    
        $random=random_int(1,10);
        if($random>=6){
            return 1;
        }
        if($random<6){
            return 0;
        }
        
    }

    public function GetDeck(){

    }
}

class PlayerCardWater extends MainCard implements PlayerInterface {
    private $name="Water";
    public function GetPassive(): int{
        
        $random=random_int(1,10);
        if($random>=8){
            return 1;
        }
        if($random<8){
            return 0;
        }
        
    }

    public function GetDeck(){

    }
    }
/////////////////////////////////////////////////         CLASSES        /////////////////////////////////////////////////
    abstract class Card {
        private $NameOfCard;
        private $EnergyCost=0;
        private $type="";
        private $Decription="";
       
        public function getCardName() {
            return $this->NameOfCard;
        }
        public function WhatTypeIsIT() {
            echo $this->type;
        }

        public function __construct(int $energycost, string $nameofcard, string $decription)
    {
        $this->EnergyCost=$energycost;
        $this->NameOfCard=$nameofcard;
        $this->Decription=$decription;
    }

    

    }

    class Deck {
        protected $ListOfCard;
        protected $Card;

        public function __construct($Card) {
            $this->Card = $Card;
            shuffle($this->Card);
        }


        public function ReadylistCards() {
            foreach($this->Card as $Card) {
                echo $Card . '<br />';
            }  
        }
    }

    
    

    class Board {
        protected MainCard $Player;
        protected MainCard $Enemy;
        protected $Mana=0;
        protected $TurnCounter=0;
        protected $winner;


        public function __construct(MainCard $player,MainCard $enemy,) {
            $this->Player = $player;
            $this->Enemy = $enemy;
        }

        public function GetWinner(){
            return $this->winner;
        }

        public function PlayTurn(){
            Log::info();
            Log::info();
            $this->TurnCounter++;
            Log::info("Trwa Tura:  $this->TurnCounter") ;
            $i=0;
            if($this->Mana <=10){
                $this->Mana++;
            };
            do{
                $this->Enemy->ChangeHP(4);
                $this->Player->ChangeHP(1);
                $i++;
            }while($i!=1);
            $eHP=$this->Enemy->GetHp();
            $pHP=$this->Player->GetHp();
            Log::info("Twoje życie wynosi:  $pHP") ;
            Log::info("Życie twojego przeciwnika wynosi:  $eHP") ;
            if($eHP<=0 || $pHP<=0){
                if($eHP>$pHP){
                $this->winner = "Przeciwnik";
				throw new WinnerWasCalled();
                }
                if($pHP>$eHP){
                    $this->winner = "Gracz";
                    throw new WinnerWasCalled();
                    }
            };
        }


    }

//////////////////////////////////////////////////                ActionCARDS           ///////////////////////////////////////////////////
    class DefensiveCards extends Card  {
        private $type="Defensive";
    
    
       
       
    
    }
    class OffensiveCards extends Card {
        private $type="Offensive";
        
     
        
    }


    class SpecialCards extends Card {
        private $type="Special";
        
       
    
        
    
    }

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/battlefield.css" type="text/css">
    <title>Fight</title>
</head>


<body>

    <?php


        $you=new PlayerCardWater();
        $notyou= new PlayerCardFire();
        $board= new Board($you,$notyou);
        try {
            while(true) {
                $board->PlayTurn();
            }
        }catch(WinnerWasCalled $exception) {
            Log::info();
            Log::info($board->GetWinner() . " wygrał.");
        }
      


    ?>

</body>


</html>