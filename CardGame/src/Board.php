<?php
namespace Game\Board;

use Game\Board\Log;

use Game\Board\MainCards\MainCard;
use Game\Board\MainCards\Interfaces\PlayerInterface;
use Game\Board\MainCards\PlayerCardAir;
use WinnerWasCalled;

    class Board {
        protected MainCard $Player;
        protected MainCard $Enemy;
        protected $HumanHand = 5;
        protected $RoboHand = 5;
        protected $Mana = 0;
        protected $TurnCounter = 0;
        protected $winner;


        public function __construct($player, $enemy) {
            $this->Player = $player;
            $this->Enemy = $enemy;
        }

        public function GetWinner() {
            return $this->winner;
        }

       


        public function PlayTurn() {

            Log::info();
            Log::info();
            $this->TurnCounter++;
            Log::info("\e[1mTrwa Tura: $this->TurnCounter\e[0m") ;
            Log::info();
            if ($this->Mana < 10) {
                $this->Mana++;
            };
        
            Log::info("\e[1mMana wynosi: $this->Mana\e[0m") ;
            Log::info();
        
            $this->Player->DisplayCards($this->HumanHand);
            $enemy = $this->Enemy;
            $player = $this->Player;

            if (($player->GetPlayerType() == "Water" AND $player->GetPassive() == 1) OR ($enemy->GetPlayerType() == "Water" AND $enemy->GetPassive() == 1)) {
                $this->Player->ChangeHP(-2);
                if($player->GetPlayerType() == "Water"){
                    log::info("Wyleczono gracza  o 2 punkty zdrowia");
                }
                if($enemy->GetPlayerType() == "Water"){
                    log::info("Wyleczono przeciwnika  o 2 punkty zdrowia");
                }
            }
            $Player_Mana=$this->Mana;
            $this->Player->SetMana($Player_Mana);
            do{
            Log::info("Czy chcesz zagrać kartę? ");
            Log::info("1 - tak; 0 - nie");
            $playerPick = readline("");

            if ($playerPick == 1){
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
                do{
                Log::info("Jaką karte chcesz zagrać? ");
                $CardPick = readline("");
                $this->Player->USE_CARD_IN_DECK($this->Enemy,$CardPick);
                $turn=$this->Player->GetDone();
                if($turn == 0){
                Log::info("Czy napewno masz odpowiednią karte do zagrania? ");
                Log::info("1 - tak     2 - nie");
                $AreYouSure = readline("");
                if($AreYouSure==2){
                    $turn=1;
                    }
                }
                }while($turn!=1);
                
                if($this->Player->GetDone()==1){
                    $this->HumanHand-=1;
                }
                $this->HumanHand+=$this->Player->GetHand();
                Log::info();
                Log::info("\e[1mPozostało ".$this->Player->GetMana()." Many\e[0m");
                Log::info();
                $test=$this->HumanHand+2;
                if($test<=$this->Player->TEST()){
                $player->DisplayCards($this->HumanHand);
                }
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
            
            }
            }while($playerPick!=0);
            if ($playerPick == 0) {
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();

                Log::info("Twoje życie wynosi:  $pHP , A twój DEF: ".$this->Player->GetDEF()) ;
                Log::info("Życie twojego przeciwnika wynosi:  $eHP, A jego DEF: ".$this->Enemy->GetDEF());
                $test=$this->HumanHand+2;
                if($test<=$this->Player->TEST()){
                $this->HumanHand+=2;
                }
            }
            if ($eHP <= 0 || $pHP <= 0) {
                if ($eHP > $pHP) {
                    $this->winner = "Przeciwnik";
				    throw new WinnerWasCalled();
                }
                if($pHP > $eHP){
                    $this->winner = "Gracz";
                    throw new WinnerWasCalled();
                    }
            };
        }
    }
?>