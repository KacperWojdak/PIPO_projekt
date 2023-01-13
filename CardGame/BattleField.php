<?php
require "./vendor/autoload.php";

use Game\Board\Board;
use Game\Board\Deck;
use Game\Board\Log;
use Game\Board\MainCards\PlayerCardFire;
use Game\Board\MainCards\PlayerCardWater;

class WinnerWasCalled extends Exception{}

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/battlefield.css" type="text/css">
    <title>Fight</title>
    
</head>


<body>

    <?php
        
        $you=new PlayerCardWater();
        $notyou= new PlayerCardFire();

        $playerDeck = new Deck($you->GetPlayerType());
        $enemyDeck = new Deck($notyou->GetPlayerType());

        $playerDeck->CreatDeck();
        $playerDeck->PushDeck(5);
        Log::info();
        echo "<br>";
        log::info();
        $enemyDeck->CreatDeck();
        $enemyDeck->PushDeck(5);
        


        $you->SetDeck($playerDeck);
        $notyou->SetDeck($enemyDeck);

        


        $board= new Board($you,$notyou);
        $board->Set_up_Game();
        try {
            while(true) {
                $board->PlayTurn();
            }
        }catch(WinnerWasCalled $exception) {
            Log::info();
            Log::info($board->GetWinner() . " wygrał.");
        }

        
      

    ?>

</body>


</html>