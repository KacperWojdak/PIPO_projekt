<?php

namespace Battle;

use Battle\OffensiveCards as BattleOffensiveCards;
use Exception;
use mysqli;

/////////////////////////////////////////       INNE                  ////////////////////////////////////////////////////////////
final class Log {

    public static function info(string $message = ""): void {
        echo $message .  PHP_EOL;
    }
}

class WinnerWasCalled extends Exception{}

/////////////////////////////////////////////////         MAIN CARDS             //////////////////////////////////////////////////////////////

class MainCard { 
    private int $HP=40;
    private int $DEF=0;
    private Deck $deck;

    public function GetPassive(): int{
        return 1;
    }
    public function GetDeck(Deck $deck){
        $this->deck=$deck;
    }

    public function GetHp(){
        return $this->HP;
    }
    public function  ChangeHP(int $mod){
         $this->HP=$this->HP-$mod;
    }
    
    public function GetDEF(){
        return $this->DEF;
    }
    public function ChangeDEF(int $def){
        $this->DEF=$this->DEF+$def;
    }

}



class PlayerCardFire extends MainCard implements Player {
    public function GetPassive(): int{
    
        $random=random_int(1,10);
        if($random>=6){
            return 1;
        }
        if($random<6){
            return 0;
        }
        
    }
    public function GetPlayerType(): string
    {
        return "Fire";
    }


}

class PlayerCardWater extends MainCard implements Player {
    public function GetPassive(): int{
        
        $random=random_int(1,10);
        if($random>=8){
            return 1;
        }
        if($random<8){
            return 0;
        }
    }
    public function GetPlayerType(): string
    {
        return "Water";
    }

    }
/////////////////////////////////////////////////////       Interface       ///////////////////////////////////////////////
interface Player{
    public function GetPlayerType():string;

}


/////////////////////////////////////////////////         CLASSES        /////////////////////////////////////////////////
    abstract class Card {
        private $NameOfCard;
        private $EnergyCost=0;
        private $type="";
        private $Value;
        private $Capacity;
       
        public function getCardName() {
            return $this->NameOfCard;
        }
        public function WhatTypeIsIT() {
            echo $this->type;
        }
        public function getEnergyCost(){
            return $this->EnergyCost;
        }
        public function getCapacity(){
            return $this->Capacity;
        }
        public function getValue(){
            return $this->Value;
        }



        public function __construct(int $energycost, string $nameofcard, int $decription,int $capacity)
    {
        $this->EnergyCost=$energycost;
        $this->NameOfCard=$nameofcard;
        $this->Value=$decription;
        $this->Capacity=$capacity;
    }

    

    }
 
    class Deck {
        protected $ListOfCard=[];
        protected Card $Card;
        protected $Type;

        public function __construct(string $type)
        {
            $this->Type=$type;
        }

        public function CreatDeck(){
            if($this->Type=='Fire'){
            $deck_conections=mysqli_connect('localhost','root','','cards');
            $test='SELECT * FROM fireattack';
            $wynik=mysqli_query($deck_conections,$test);

            while ($row = mysqli_fetch_assoc($wynik)) {
            $card=new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
            $this->AddCard($card);
            }

            /////////
            $test='SELECT * FROM firedeff';
            $wynik=mysqli_query($deck_conections,$test);

            while ($row = mysqli_fetch_assoc($wynik)) {
            $card=new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
            $this->AddCard($card);
            }
            ///////
            $test='SELECT * FROM firespecial';
            $wynik=mysqli_query($deck_conections,$test);

            while ($row = mysqli_fetch_assoc($wynik)) {
            $card=new SpecialCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
            $this->AddCard($card);
            }
            foreach($this->ListOfCard as $cardname){
                echo $cardname->getCardName();
                log::info();
            }
            }
            if($this->Type=='Water'){
                $deck_conections=mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM waterattack';
                $wynik=mysqli_query($deck_conections,$test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                $card=new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
                }
    
                /////////
                $test='SELECT * FROM waterdeff';
                $wynik=mysqli_query($deck_conections,$test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                $card=new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
                }
                ///////
                $test='SELECT * FROM waterspecial';
                $wynik=mysqli_query($deck_conections,$test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                $card=new SpecialCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
                }
                foreach($this->ListOfCard as $cardname){
                    echo $cardname->getCardName();
                    log::info();
                }
            }
            
        }

        public function AddCard(Card $Card) {
            $this->ListOfCard[] = $Card;
            shuffle($this->ListOfCard);
        }

        public function ReadylistCards() {
            foreach($this->Card as $Card) {
                echo $Card . '<br />';
            }  
        }
    }

    
    
    class Board  {
        protected MainCard $Player;
        protected MainCard $Enemy;
        protected $Mana=1;
        protected $TurnCounter=0;
        protected $winner;


        public function __construct(MainCard $player,MainCard $enemy) {
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
            Log::info("Mana wynosi:  $this->Mana") ;
            $i=0;
            if($this->Mana <10){
                $this->Mana++;
            };
            $player=$this->Player;
            if($player->GetPassive()==1){
                $this->Player->ChangeHP(-2);
                log::info("Wyleczono maga wody o 2 punkty zdrowia");
            }

            do{ 
                $attackE=2;
                $attackP=4;
                $enemy=$this->Enemy;
                if($enemy->GetPassive()==1){
                    $attackE=$attackE*2;
                    log::info("Trafenie Krtyczne");
                }
                $this->Player->ChangeDEF(3);
                $this->Enemy->ChangeDEF(1);
                if($this->Enemy->GetDEF()>0){
                    $dmgP=$attackP-$this->Enemy->GetDEF();
                    if($dmgP<=0){
                        $this->Enemy->ChangeDEF(-($attackP));
                        $dmgP=0;
                    }
                    if($dmgP>0){
                        $this->Enemy->ChangeDEF(-($attackP-$dmgP));
                    }
                }
                if($this->Player->GetDEF()>0){
                    $dmgE=$attackE-$this->Player->GetDEF();
                    if($dmgE<=0){
                        $this->Player->ChangeDEF(-($attackE));
                        $dmgE=0;
                    }
                    if($dmgE>0){
                        $this->Player->ChangeDEF(-($attackE-$dmgE));
                    }
                }
                $this->Enemy->ChangeHP($dmgP);
                $this->Player->ChangeHP($dmgE);
                $i++;
            }while($i!=1);
            $eHP=$this->Enemy->GetHp();
            $pHP=$this->Player->GetHp();
            Log::info("Twoje życie wynosi:  $pHP , A twój DEF: ".$this->Player->GetDEF()) ;
            Log::info("Życie twojego przeciwnika wynosi:  $eHP, A jego DEF: ".$this->Enemy->GetDEF()) ;
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
    
    
       public function AddDef(){
       }
       public function AddHP(){
    }
       
    
    }
    class OffensiveCards extends Card {
        private $type="Offensive";
        
        public function AttackDMG(){

        }
        
    }


    class SpecialCards extends Card {
        private $type="Special";
        
       public function DrawCard(){

       }
       public function Nothing(){
        
       }
       public function RegenMana(){
        
       }
       public function Pass(){

       }
        
    
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
        $playerDeck = new Deck($you->GetPlayerType());
        $enemyDeck = new Deck($notyou->GetPlayerType());

        $playerDeck->CreatDeck();
        log::info();
        log::info();
        $enemyDeck->CreatDeck();


        $you->GetDeck($playerDeck);
        $notyou->GetDeck($enemyDeck);


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