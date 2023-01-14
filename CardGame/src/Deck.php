<?php

namespace Game\Board;

use Game\Board\Log;
use Game\Board\ActionsCards\DefensiveCards;
use Game\Board\ActionsCards\OffensiveCards;
use Game\Board\ActionsCards\SpecialCards;


    class Deck {
        protected $ListOfCard=[];
        protected Card $Card;
        protected $Type;

        public function __construct(string $type)
        {
            $this->Type=$type;
        }

        public function PushDeck(int $num_of_card){
            for($i=0;$i<$num_of_card;$i++){
                $card_of_deck=$this->ListOfCard[$i];
                Log::info($card_of_deck->getCardName()." ".$card_of_deck->getEnergyCost()." ".$card_of_deck->getCapacity()." ".$card_of_deck->getValue());
            }
        }
        public function PushCardToHand(int $How_Many){

            for($i=0;$i<$How_Many;$i++){
                $card_of_deck=$this->ListOfCard[$i] ;
                return $card_of_deck;
            }
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
            }
            
        }

        public function AddCard(Card $Card) {
            $this->ListOfCard[] = $Card;
            shuffle($this->ListOfCard);
        }
        
    
    
    }
?>