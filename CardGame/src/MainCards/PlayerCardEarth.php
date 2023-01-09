<?php 

namespace Board\MainCards\MainCards\PlayerCardEarth;

use Board\MainCards\Interfaces\PlayerInterface\PlayerInterface;
use Board\MainCards\MainCards\MainCard;

class PlayerCardEarth extends MainCard implements PlayerInterface{
    private $HP=20;
    private $deck;


    public function GetPassive(): int{
        return 1;  
    }

    }


?>