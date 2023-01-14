<?php 

namespace  Game\Board\MainCards;

use Game\Board\MainCards\Interfaces\PlayerInterface;

class PlayerCardEarth extends MainCard implements PlayerInterface{
    private $HP = 20;
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