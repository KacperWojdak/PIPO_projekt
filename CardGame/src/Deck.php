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

        public function DisplayDeck(int $num_of_card) {
            for ($i = 0; $i < $num_of_card; $i++) {
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
                    Log::info("\e[32m".$name." ".$energy." ".$efect.$value."\e[0m");
                }

                if ($card_of_deck instanceof OffensiveCards) {
                    $efect = "Zadaj obrażenia o wartośći ";
                    $value = $card_of_deck->getValue();
                    Log::info("\e[31m".$name." ".$energy." ".$efect.$value."\e[0m");
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
                    Log::info("\e[35m".$name." ".$energy." ".$efect.$value."\e[0m");
                }
            }
        }

        public function PushDeck() {
                $card_of_deck = $this->ListOfCard[0];
                $name = $card_of_deck->getCardName();
                $energy = $card_of_deck->getEnergyCost();
                $capacity = $card_of_deck->getCapacity();
                $value = $card_of_deck->getValue();
                return [$energy, $name, $capacity, $value];
                \array_splice($this->ListOfCard, 1, 0);
            }
    
        public function CreatDeck() {
            if ($this->Type == "Fire") {
                $deck_conections=mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM fireattack';
                $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
            }

            /////////
            $test='SELECT * FROM firedeff';
            $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
            }
            ///////
            $test='SELECT * FROM firespecial';
            $wynik = mysqli_query($deck_conections, $test);

            while ($row = mysqli_fetch_assoc($wynik)) {
                $card =  new SpecialCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
            }
            }
            if ($this->Type == "Water") {
                $deck_conections = mysqli_connect('localhost','root','','cards');
                $test='SELECT * FROM waterattack';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                $card = new OffensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                $this->AddCard($card);
                }
    
                /////////
                $test='SELECT * FROM waterdeff';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new DefensiveCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
                    $this->AddCard($card);
                }

                ///////
                $test='SELECT * FROM waterspecial';
                $wynik = mysqli_query($deck_conections, $test);
    
                while ($row = mysqli_fetch_assoc($wynik)) {
                    $card = new SpecialCards($row["EnergyCost"], $row["Name"], $row["Decsription"], $row["Effect"]);
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