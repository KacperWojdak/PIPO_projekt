<?php 

namespace Board\MainCards\MainCards\PlayerCardAir;

use Board\MainCards\Interfaces\PlayerInterface\PlayerInterface;
use Board\MainCards\MainCards\MainCard;

class PlayerCardAir extends MainCard implements PlayerInterface { 
    private $HP=35;
    private $deck;


    public function GetDeck(){

    }

    public function GetPassive(): int{
        
        $random=random_int(1,10);
        if($random>=9){
            return 1;
        }
        if($random<9){
            return 0;
        }
        
    }
}





?>