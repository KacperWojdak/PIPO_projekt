<?php 

namespace Game\Board\MainCards;
use Game\Board\Log;
use Game\Board\Deck;
use Game\Board\MainCards\Interfaces\PlayerInterface;

class MainCard implements PlayerInterface { 

    private int $HP = 40;
    private int $DEF = 0;
    private $Hand = [];
    private Deck $deck;
    private $type = "";

    

    public function UseCard(int $nr) {
        \array_splice($this->Hand, 1, $nr);
    }

    public function ADD_CARD_TO_HAND(){
        $this->Hand=$this->deck->PushDeck();
    }
    public function SHOW_HAND(){
        array_push($this->Hand);
    }

    public function SetDeck(Deck $deck) {
        $this->deck = $deck;
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
    public function  ChangeHP(int $HP) {
         $this->HP = $this->HP-$HP;
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

}

?>