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
            Log::info("\e[1mRound: $this->TurnCounter\e[0m") ;
            Log::info();
            if ($this->Mana < 10) {
                $this->Mana++;
            };
        
            Log::info("\e[1mYou have $this->Mana\e[0m Mana") ;
            Log::info();
        
            $this->Player->DisplayCards($this->HumanHand);
            $enemy = $this->Enemy;
            $player = $this->Player;

            if (($player->GetPlayerType() == "Water" AND $player->GetPassive() == 1) OR ($enemy->GetPlayerType() == "Water" AND $enemy->GetPassive() == 1)) {
                $this->Player->ChangeHP(-2);
                if ($player->GetPlayerType() == "Water") {
                    log::info("Player healed by 2 points");
                }
                if ($enemy->GetPlayerType() == "Water") {
                    log::info("Opponent healed by 2 points");
                }
            }
            $Player_Mana=$this->Mana;
            $this->Player->SetMana($Player_Mana);
            $this->Enemy->SetMana($Player_Mana);
            do {
            Log::info("Do you want to play a card? ");
            Log::info("1 - yes; 2 - no");
            $playerPick = readline("");
          

            if ($playerPick == 1) {
                do {
                Log::info("Which card? ");
                $CardPick = readline("");
                $this->Player->USE_CARD_IN_DECK($this->Enemy,$CardPick);
                $turn=$this->Player->GetDone();
                if ($turn == 0) {
                    Log::info("Are you sure you have the right card to play? ");
                    Log::info("1 - yes     2 - no");
                    $AreYouSure = readline("");
                    if ($AreYouSure == 2){
                        $turn = 1;
                    }
                }
                } while ($turn != 1);
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
                if ($eHP <= 0 || $pHP <= 0) {
                    if ($eHP > $pHP) {
                        $this->winner = "Opponent";
                        throw new WinnerWasCalled();
                    }
                    if ($pHP > $eHP) {
                        $this->winner = "Player";
                        throw new WinnerWasCalled();
                    }
                };
                
                $playerPick = 3;
                Log::info("Enemy: ");
                do {
                    $robochoice = random_int(1, $this->RoboHand);
                    $this->Enemy->USE_CARD_IN_DECK($this->Player, $robochoice);
                    $Enemyturn = $this->Enemy->GetDone();
                    if ($Enemyturn == 0) {
                        $AreYouSure = random_int(1, 2);
                    if ($AreYouSure == 2) {
                        log::info("Pass");
                        $Enemyturn = 1;
                        }
                    }
                    } while ($Enemyturn != 1);
                
                if ($this->Player->GetDone() == 1) {
                    $this->HumanHand -= 1;
                }
                if ($this->Enemy->GetDone() == 1) {
                    $this->RoboHand -= 1;
                }

                $this->HumanHand += $this->Player->GetHand();
                $this->RoboHand += $this->Enemy->GetHand();
                Log::info();
                Log::info("\e[1mYou have ".$this->Player->GetMana()." Mana left\e[0m");
                Log::info();
                $Playertest = $this->HumanHand + 2;

                if ($Playertest <= $this->Player->TEST()) {
                $player->DisplayCards($this->HumanHand);
                }
                    $Enemytest = $this->RoboHand + 2;
                if ($Enemytest <= $this->Enemy->TEST()) {
                    $enemy->DisplayCards($this->RoboHand);
                }
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();
            
            }
            } while($playerPick != 2);
            if($playerPick==2){
                Log::info("Enemy: ");
                do {
                    $robochoice = random_int(1,$this->RoboHand);
                    $this->Enemy->USE_CARD_IN_DECK($this->Player, $robochoice);
                    $Enemyturn = $this->Enemy->GetDone();
                    if ($Enemyturn == 0) {
                        $AreYouSure = random_int(1, 2);
                    if ($AreYouSure == 2) {
                        Log::info("Pass");
                        $Enemyturn = 1;
                        }
                    }
                    } while ($Enemyturn != 1);
                    if ($this->Enemy->GetDone() == 1) {
                        $this->RoboHand -= 1;
                    }
    
                    $playerPick=3;
            }
            if ($playerPick == 3) {
                
                $eHP = $this->Enemy->GetHp();
                $pHP = $this->Player->GetHp();

                Log::info("Your health is:  $pHP , and your Defense: ".$this->Player->GetDEF()) ;
                Log::info("Your opponent's life is:  $eHP, and his Defense: ".$this->Enemy->GetDEF());
                $test=$this->HumanHand+2;
                if ($test<=$this->Player->TEST()) {
                    $this->HumanHand += 2;
                }
                $test=$this->RoboHand+2;
                if ($test<=$this->Enemy->TEST()) {
                    $this->RoboHand += 2;
                }
            }
            if ($eHP <= 0 || $pHP <= 0) {
                if ($eHP > $pHP) {
                    $this->winner = "Opponent";
				    throw new WinnerWasCalled();
                }
                if ($pHP > $eHP) {
                    $this->winner = "Player";
                    throw new WinnerWasCalled();
                }
            };
        }
    }
?>