<?php 

namespace Game\Board\MainCards;
use Game\Board\Log;
use Game\Board\Deck;
use Game\Board\MainCards\Interfaces\PlayerInterface;

class MainCard implements PlayerInterface { 

    private int $HP = 20;
    private int $DEF = 0;
    private Deck $deck;
    private $type = "";
    private $mana = 0;
    private $Done=0;
    private $Hand=0;

    
    
    public function TEST(){
       return $this->deck->lengthOfDeck();
    }
    public function SetDeck(Deck $deck) {
        $this->deck = $deck;
    }

    public function USE_CARD_IN_DECK(MainCard $Enemy, int $nr) {
        $this->Done = 0;
        $this->Hand = 0;
        $nr -= 1;
        $card[] = $this->deck->CHOICE_CARD($nr);
        if ($card[0][3] <= $this->mana) {
            $this->mana -= $card[0][3];
        if ($card[0][0]==1) {
            Log::info("Zadano ".$card[0][1]." obrażeń");
            $Enemy->ChangeHP($card[0][1]);
            $this->deck->DELTE_CARD($nr);
            $this->Done = 1;
        }

        if ($card[0][0] == 2) {
            if ($card[0][2] == 1) {
            Log::info("Zwiększono obronę o ".$card[0][1]." pkt");
            $this->ChangeDEF($card[0][1]);
            $this->deck->DELTE_CARD($nr);
            $this->Done = 1;
           
            }
            if ($card[0][2] == 2) {
                Log::info("Wyleczono ".$card[0][1]." Hp");
                $this->ChangeHP(-$card[0][1]);
                $this->deck->DELTE_CARD($nr);
                $this->Done = 1;   
            }
        }

        if ($card[0][0] == 3) {
                if ($card[0][2] == 1) {
                    Log::info("Dobrano ".$card[0][1]." Karty");
                    $this->Hand = $card[0][1];
                    $this->deck->DELTE_CARD($nr);
                    $this->Done = 1;
                }
                if ($card[0][2] == 2) {
                    Log::info("NIc się nie stało");
                    $this->deck->DELTE_CARD($nr);
                    $this->Done = 1;
                }
                if ($card[0][2] == 3) {
                    Log::info("Przetasowno Karty");
                    $this->deck->ShuffleDeck();
                    $this->deck->DELTE_CARD($nr);
                    $this->Done = 1;
                }
                if ($card[0][2] == 4) {
                    Log::info("Dodano ".$card[0][1]." Many");
                    $this->mana += $card[0][1];
                    $this->deck->DELTE_CARD($nr);
                    $this->Done = 1;
                }  
            }
        }
    }

    public function GetHand() {
        return $this->Hand;
    }
    public function GetDone() {
        return $this->Done;
    }

    public function GetPassive(): int {
        return 1;
    }

    public function DisplayCards(int $Number) {
        $costam = $this->deck;
        $costam->DisplayDeck($Number);
    }

    public function GetCards() {
        $this->deck->PushDeck();
    }

    public function GetDeck() {
       return $this->deck->PushDeck(5);
    }

    public function GetHp() {
        return $this->HP;
    }
    public function  ChangeHP($HP) {
        if ($HP < 0) {
         $this->HP = $this->HP - $HP;
        }
        if ($HP > 0) {
            $def=$this->DEF;
            if ($HP > $def) {
                $reszta = $HP - $def;
                $this->ChangeDEF($HP - $reszta);
                $this->HP = $this->HP - $reszta;
            }
        }
    }
    
    public function GetDEF() {
        return $this->DEF;
    }

    public function ChangeDEF(int $def) {
        $this->DEF = $this->DEF+$def;
    }

    public function GetPlayerType(): string {
        return $this->type;
    }
    public function SetMana(int $mana){
        $this->mana=$mana;
    }
    public function GetMana(){
        return $this->mana;
    }
}

?>