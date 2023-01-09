<?php

namespace CardGame\Classes\Board;

use CardGame\MainCards\MainCard;

    class Board {
        protected $Player;
        protected $Enemy;
        protected $Mana=0;
        protected $TurnCounter=0;


        public function __construct(MainCard $player,MainCard $enemy) {
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
            if($eHP<=0 || $pHP<=0){
                return False;
            };
        }


    }
?>