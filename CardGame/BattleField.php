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
    //$waterDeck = new PlayerCardWater();
    //$fireDeck = new PlayerCardFire();
    //$earthDeck = new PlayerCardEarth();
    //$airDeck = new PlayerCardAir();
 //       $waterDeck = 1;
//        $fireDeck = 2;
//        $earthDeck = 3;
//        $airDeck = 4;
//
//        Log::info("Wybierz swoją talię: ") . PHP_EOL;
//        Log::info("1 - \e[1;34;42mTalia żywiołu wody\e[0m") . PHP_EOL;
//        Log::info("2 - \e[1;31;42mTalia żywiołu ognia\e[0m") . PHP_EOL;
//        Log::info("3 - \e[0;33;42mTalia żywiołu ziemi\e[0m") . PHP_EOL;
//        Log::info("4 - \e[0;37;42mTalia żywiołu powietrza\e[0m") . PHP_EOL;
//
//
 //       $playerChoose = readline("");
 //       
        $you = new PlayerCardWater();
        $notyou = new PlayerCardFire();

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