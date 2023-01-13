<?php

namespace  Game\Board\MainCards;

use Game\Board\MainCards\Interfaces\PlayerInterface;

class PlayerCardFire extends MainCard implements PlayerInterface{

    public function GetPassive(): int{
    
        $random=random_int(1,10);
        if($random>=6){
            return 1;
        }
        if($random<6){
            return 0;
        }
        
    }
    public function GetPlayerType(): string
    {
        return "Fire";
    }

}



?>