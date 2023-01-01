<?php 

namespace CardGame\MainCards;

class PlayerCardEarth {
    private $HP=20;
    private $deck;

    public function CardGame(PlayerCardEarth $HP, PlayerCardEarth $deck){
        $this->HP=$HP;
        $this->deck=$deck;
    }

}


?>