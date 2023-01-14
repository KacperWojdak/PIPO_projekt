<?php

namespace Game\Board;

use Game\Board\Log;
use Game\Board\ActionsCards\DefensiveCards;
use Game\Board\ActionsCards\OffensiveCards;
use Game\Board\ActionsCards\SpecialCards;

    class Deck {
        protected $ListOfCard = [];
        protected Card $Card;
        protected $Type;


        public function __construct(string $type) {
            $this->Type = $type;
        }

        public function lengthOfDeck() {
           return count($this->ListOfCard);
        }
        
        public function DisplayDeck(int $num_of_card) {
            for ($i = 0; $i < $num_of_card; $i++) {
                $int=$i+1;
                $card_of_deck = $this->ListOfCard[$i];
                $name = $card_of_deck->getCardName();
                $energy = $card_of_deck->getEnergyCost();

                if ($card_of_deck instanceof DefensiveCards) {
                    if ($card_of_deck->getCapacity() == 1) {
                        $efect="Zwiększ obronę o ";
                    }
                    if($card_of_deck->getCapacity() == 2) {
                        $efect="Wylecz o ";   
                    }
                    $value = $card_of_deck->getValue() ;
                    Log::info("\e[32m".$int."- [".$energy."] ".$name." - (".$efect.$value.")\e[0m");
                }

                if ($card_of_deck instanceof OffensiveCards) {
                    $efect = "Zadaj obrażenia o wartośći ";
                    $value = $card_of_deck->getValue();
                    Log::info("\e[31m".$int."- [".$energy."] ".$name." - (".$efect.$value.")\e[0m");
                }

                if ($card_of_deck instanceof SpecialCards) {
                    if ($card_of_deck->getCapacity() == 1) {
                        $efect = "Dobierz karty : ";
                        $value = $card_of_deck->getValue();
                    }
                    if ($card_of_deck->getCapacity() == 2) {
                        $efect = "Nic nie robi ";   
                        $value = "";
                    }
                    if ($card_of_deck->getCapacity() == 3) {
                        $efect = "Przetasuj talię ";
                        $value = "";
                    }
                    if ($card_of_deck->getCapacity() == 4) {
                        $efect = "Odnów Manę o ";  
                        $value = $card_of_deck->getValue(); 
                    }
                    Log::info("\e[35m".$int."- [".$energy."] ".$name." - (".$efect.$value.")\e[0m");
                }
            }
        }


        public function ShuffleDeck(){
            shuffle($this->ListOfCard);
        }
        public function PushDeck() {
                $card_of_deck = $this->ListOfCard[0];
                $name = $card_of_deck->getCardName();
                $energy = $card_of_deck->getEnergyCost();
                $capacity = $card_of_deck->getCapacity();
                $value = $card_of_deck->getValue();
                \array_splice($this->ListOfCard, 1, 0);
                return [$energy, $name, $capacity, $value];
            }
    
        public function CreateDeck() {
            if ($this->Type == "Fire") {
                $deck_conections=mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM fireattack';
                $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                $this->AddCard($card);
            }

            /////////
            $test='SELECT * FROM firedeff';
            $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                $this->AddCard($card);
            }
            ///////
            $test='SELECT * FROM firespecial';
            $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card =  new SpecialCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                $this->AddCard($card);
            }
            }
            if ($this->Type == "Water") {
                $deck_conections = mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM waterattack';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                $this->AddCard($card);
                }
    
                /////////
                $test='SELECT * FROM waterdeff';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }

                ///////
                $test='SELECT * FROM waterspecial';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new SpecialCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }
            }

            if ($this->Type == "Air") {
                $deck_conections=mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM airattack';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }

                /////////
                $test='SELECT * FROM airdeff';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }
                ///////
                $test='SELECT * FROM airspecial';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card =  new SpecialCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }
            }

            if ($this->Type == "Earth") {
                $deck_conections=mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM earthattack';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }

                /////////
                $test='SELECT * FROM earthdeff';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }
                ///////
                $test='SELECT * FROM earthspecial';
                $wynik = mysqli_query($deck_conections, $test);

                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card =  new SpecialCards($row["EnergyCost"], $row["Name"], $row["Description"], $row["Effect"]);
                    $this->AddCard($card);
                }
            }
        }

        public function AddCard(Card $Card) {
            $this->ListOfCard[] = $Card;
            shuffle($this->ListOfCard);
        }

        public function CHOICE_CARD(int $nr){
            $choice=$this->ListOfCard[$nr];
            if($choice instanceof DefensiveCards){
                $value=$choice->getValue();
                $energy=$choice->getEnergyCost();
                $description=$choice->getCapacity();
                $deff=[2,$value,$description,$energy];
                return $deff;
                
            }
            if ($choice instanceof SpecialCards) {
                $value = $choice->getValue();
                $description = $choice->getCapacity();
                $energy = $choice->getEnergyCost();
                $special = [3, $value, $description, $energy];
                return $special;
                
            }
            if ($choice instanceof OffensiveCards) {
                $value = $choice->getValue();
                $description = 1;
                $energy = $choice->getEnergyCost();
                $attack = [1, $value, 1, $energy];
                return $attack;
                
            }
        }
        public function DELTE_CARD(int $nr) {
            array_splice($this->ListOfCard, $nr, 1);
        }
    }
?>