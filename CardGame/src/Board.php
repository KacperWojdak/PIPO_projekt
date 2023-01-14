<?php
namespace Game\Board;

use Game\Board\Log;
use Game\Board\MainCards\MainCard;
use Game\Board\MainCards\Interfaces\PlayerInterface;
use WinnerWasCalled;

    class Board {
        protected MainCard $Player;
        protected MainCard $Enemy;
        protected $HumanHand = 5;
        protected $Mana = 1;
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
            Log::info("\e[1mMana wynosi: $this->Mana\e[0m") ;
            Log::info();
            $i = 0;
            if ($this->Mana < 10) {
                $this->Mana++;
            };
        
            $this->Player->DisplayCards($this->HumanHand);
            $enemy = $this->Enemy;
            $player = $this->Player;

            if (($player->GetPlayerType() == "Water" AND $player->GetPassive() == 1) OR ($enemy->GetPlayerType() == "Water" AND $enemy->GetPassive() == 1)) {
                $this->Player->ChangeHP(-2);
                log::info("Wyleczono maga wody o 2 punkty zdrowia");
            }
            do{
            Log::info("Czy chcesz zagrać kartę? ");
            Log::info("1 - tak; 0 - nie");
            $playerPick = readline("");

            if ($playerPick == 1){
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
                Log::info("Jaką karte chcesz zagrać? ");
                $CardPick = readline("");
                $this->Player->USE_CARD_IN_DECK($this->Enemy,$CardPick);
                $this->HumanHand-=1;
                $player->DisplayCards($this->HumanHand);
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
            
            }
            }while($playerPick!=0);
            if ($playerPick == 0) {
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();

                Log::info("Twoje życie wynosi:  $pHP , A twój DEF: ".$this->Player->GetDEF()) ;
                Log::info("Życie twojego przeciwnika wynosi:  $eHP, A jego DEF: ".$this->Enemy->GetDEF());
                $this->HumanHand+=2;
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