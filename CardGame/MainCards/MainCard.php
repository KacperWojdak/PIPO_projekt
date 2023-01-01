<?php 

namespace CardGame\MainCards;

class MainCard{ 
    private $HP=40;
    private $deck;

    public function CardGame(MainCard $deck){
        $this->deck=$deck;
    }

}


?>