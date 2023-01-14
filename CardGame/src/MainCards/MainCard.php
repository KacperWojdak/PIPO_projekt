<?php 

namespace Game\Board\MainCards;
use Game\Board\Log;
use Game\Board\Deck;
use Game\Board\MainCards\Interfaces\PlayerInterface;

class MainCard implements PlayerInterface { 

    private int $HP = 40;
    private int $DEF = 0;
    private Deck $deck;
    private $type = "";

    
    

    public function SetDeck(Deck $deck) {
        $this->deck = $deck;
    }

    public function USE_CARD_IN_DECK(MainCard $Enemy,int $nr){
        $nr-=1;
        $card[]=$this->deck->CHOICE_CARD($nr);
        if($card[0][0]==1){
            $Enemy->ChangeHP($card[0][1]);
            log::info("atack");
        }
        if($card[0][0]==2){
            if($card[0][2]==1){
            $this->ChangeDEF($card[0][1]);
            log::info("Deff");
            }
            if($card[0][2]==2){
                $this->ChangeHP(-$card[0][1]);
                log::info("Heal");
            }
           
        }
        if($card[0][0]==3){
            log::info("Nic");
        }

    }

    public function GetPassive(): int {
        return 1;
    }

    public function DisplayCards(int $Number) {
        $costam = $this->deck;
        $costam->DisplayDeck($Number);
    }

    public function GetCards() {
        $this->deck->PushDeck();
    }

    public function GetDeck() {
       return $this->deck->PushDeck(5);
    }

    public function GetHp() {
        return $this->HP;
    }
    public function  ChangeHP( $HP) {
        if($HP <0){
         $this->HP = $this->HP-$HP;
        }
        if($HP >0){
            $def=$this->DEF;
            if($HP>$def){
                $reszta=$HP-$def;
                $this->ChangeDEF($HP-$reszta);
                $this->HP=$this->HP-$reszta;
            }
        }
    }
    
    public function GetDEF() {
        return $this->DEF;
    }

    public function ChangeDEF(int $def) {
        $this->DEF = $this->DEF+$def;
    }

    public function GetPlayerType(): string {
        return $this->type;
    }

}

?>