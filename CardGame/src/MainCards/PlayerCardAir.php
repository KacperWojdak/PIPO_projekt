<?php 

namespace  Game\Board\MainCards;

use Game\Board\MainCards\Interfaces\PlayerInterface;

class PlayerCardAir extends MainCard implements PlayerInterface { 
    private $HP = 15;
    private $deck;
    private $type = "Air";

    public function GetDeck() {}

    public function GetPassive(): int {
        
        $random = random_int(1, 10);
        if ($random >= 9) {
            return 1;
        }
        if ($random < 9) {
            return 0;
        }
        
    }

    public function GetPlayerType(): string {
        return $this->type;
    }
}

?>