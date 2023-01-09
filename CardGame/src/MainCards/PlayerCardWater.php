<?php 

namespace Board\MainCards\MainCards\PlayerCardWater;

use Board\MainCards\Interfaces\PlayerInterface\PlayerInterface;
use Board\MainCards\MainCards\MainCard;

class PlayerCardWater extends MainCard implements PlayerInterface {

    public function GetPassive(): int{
        
        $random=random_int(1,10);
        if($random>=8){
            return 1;
        }
        if($random<8){
            return 0;
        }
        
    }

    public function GetDeck(){

    }
    }


?>