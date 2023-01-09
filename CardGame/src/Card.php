<?php

namespace Board\Card;

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
?>