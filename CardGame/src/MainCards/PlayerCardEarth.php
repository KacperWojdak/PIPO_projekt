<?php 

namespace  Game\Board\MainCards;

use Game\Board\MainCards\Interfaces\PlayerInterface;

class PlayerCardEarth extends MainCard implements PlayerInterface{
    private $deck;
    private $type = "Earth";


    public function GetPassive(): int {
        return 1;  
    }

    public function GetPlayerType(): string {
        return $this->type;
    } 
}

?>