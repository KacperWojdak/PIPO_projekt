<?php 

namespace  Game\Board\MainCards;

use Game\Board\MainCards\Interfaces\PlayerInterface;

class PlayerCardWater extends MainCard implements PlayerInterface {
    private $type="Water";

    public function GetPassive(): int{
        
        $random=random_int(1,10);
        if($random>=8){
            return 1;
        }
        if($random<8){
            return 0;
        }
    }
    public function GetPlayerType(): string{
        return $this->type;
    }
    }


?>