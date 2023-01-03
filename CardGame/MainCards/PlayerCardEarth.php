<?php 

namespace CardGame\MainCards;

class PlayerCardEarth extends MainCard implements PlayerInterface{
    private $HP=20;
    private $deck;


    public function GetPassive(): int{
        return 1;  
    }

    }


?>