<?php
namespace Battle;
final class Log {

    public static function info(string $message = ""): void {
        echo $message .  PHP_EOL;
    }
}
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
         $this->HP=$this->HP-$mod;
    }

}


interface PlayerInterface {

	public function GetPassive(): int;



}
class PlayerCardFire extends MainCard implements PlayerInterface{

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

    class Board {
        protected $Player;
        protected $Enemy;
        protected $Mana=0;
        protected $TurnCounter=0;


        public function __construct(MainCard $player,MainCard $enemy,) {
            $this->Player = $player;
            $this->Enemy = $enemy;
        }



        public function PlayTurn(){
            $this->TurnCounter++;
            echo $this->TurnCounter;
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
            Log::info("Hp twoje $pHP, Hp Enemy $eHP") ;
            if($eHP<=0 || $pHP<=0){
                return False;
            };
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
        $board= new Board($you,$notyou);
        do{
           $koniec=$board->PlayTurn();
        }while($koniec!=false)
      


    ?>

</body>


</html>