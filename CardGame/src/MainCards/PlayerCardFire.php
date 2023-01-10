<?php

namespace Board\MainCards\MainCards\PlayerCardFire;
include './src/MainCards/MainCard.php';
include './src/MainCards/Interfaces/PlayerInterface.php';

use Board\MainCards\MainCards\MainCard;
use src\MainCards\Interfaces\PlayerInterface\PlayerInterface;

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

    public function GetDeck(){

    }
}



?>