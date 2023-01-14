<?php

namespace Game\Board;

    abstract class Card {
        private $NameOfCard="";
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
?>