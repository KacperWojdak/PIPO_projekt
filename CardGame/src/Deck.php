<?php

namespace Board\Deck;

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
?>