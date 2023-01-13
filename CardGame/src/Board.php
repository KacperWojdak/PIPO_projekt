<?php
namespace Game\Board;

use Game\Board\Log;
use Game\Board\MainCards\MainCard;
use WinnerWasCalled;

    class Board {
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

        
        public function Set_up_Game(){

        }

        public function PlayTurn(){

            Log::info();
            Log::info();
            $this->TurnCounter++;
            Log::info("Trwa Tura:  $this->TurnCounter") ;
            echo "<br>" ;
            Log::info("Mana wynosi:  $this->Mana") ;
            echo "<br>" ;
            $i=0;
            if($this->Mana <10){
                $this->Mana++;
            };
            $player=$this->Player;
            if($player->GetPassive()==1){
                $this->Player->ChangeHP(-2);
                log::info("Wyleczono maga wody o 2 punkty zdrowia");
                echo "<br>" ;
            }
         
            do{ 
                //Log::info("Którą chcesz zagrać kartę: ");
                //$chocie_of_Player=readline();
                $attackE=2;
                $attackP=4;

                $enemy=$this->Enemy;
                if($enemy->GetPassive()==1){
                    $attackE=$attackE*2;
                    log::info("Trafenie Krtyczne");
                    echo "<br>" ;
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
            echo "<br>" ;
            Log::info("Życie twojego przeciwnika wynosi:  $eHP, A jego DEF: ".$this->Enemy->GetDEF()) ;
            echo "<br>" ;
            
            
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
?>