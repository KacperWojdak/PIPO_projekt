<?php

namespace CardGame\Classes\Board;

use CardGame\MainCards\MainCard;

    class Board {
        protected $Player;
        protected $Enemy;

        public function __construct(MainCard $player,MainCard $enemy,) {
            $this->Player = $player;
            $this->Enemy = $enemy;
        }

    }
?>