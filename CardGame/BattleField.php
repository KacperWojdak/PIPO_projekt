<?php
require "./vendor/autoload.php";

use Game\Board\Board;
use Game\Board\Deck;
use Game\Board\Log;
use Game\Board\MainCards\PlayerCardAir;
use Game\Board\MainCards\PlayerCardEarth;
use Game\Board\MainCards\PlayerCardFire;
use Game\Board\MainCards\PlayerCardWater;
use Game\Board\MainCards\Interfaces\PlayerInterface;

class WinnerWasCalled extends Exception{}

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/battlefield.css" type="text/css">
    <title>Fight</title>
    
</head>


<body>

    <?php
 Log::info("Wybierz swoją talię: ") . PHP_EOL;
 Log::info("1 - \e[1;34;42mTalia żywiołu wody\e[0m") . PHP_EOL;
 Log::info("2 - \e[1;31;42mTalia żywiołu ognia\e[0m") . PHP_EOL;
 Log::info("3 - \e[0;33;42mTalia żywiołu ziemi\e[0m") . PHP_EOL;
 Log::info("4 - \e[0;37;42mTalia żywiołu powietrza\e[0m") . PHP_EOL;


 $playerChoose = readline("");
   if ($playerChoose == 1) {
       $player = new PlayerCardWater();
}
   if ($playerChoose == 2) {
       $player = new PlayerCardFire();
}
   if ($playerChoose == 3) {
       $player = new PlayerCardEarth();
}
   if ($playerChoose == 4) {
       $player = new PlayerCardAir();
}

Log::info("Wybierz talię przeciwnika: ") . PHP_EOL;
$enemyChoose = readline("");

if ($enemyChoose == 1) {
           $enemy = new PlayerCardWater();
}
     if ($enemyChoose == 2) {
           $enemy = new PlayerCardFire();
}
      if ($enemyChoose == 3) {
           $enemy = new PlayerCardEarth();
}
       if ($enemyChoose == 4) {
           $enemy = new PlayerCardAir();
}

LOG::info("Typ gracza ".$player->GetPlayerType());

 $playerDeck = new Deck($player->GetPlayerType());
 $enemyDeck = new Deck($enemy->GetPlayerType());


        $playerDeck->CreatDeck();
        $playerDeck->PushDeck(5);
        Log::info();
        log::info();
        $enemyDeck->CreatDeck();
        $enemyDeck->PushDeck(5);
        


        $you->SetDeck($playerDeck);
        $notyou->SetDeck($enemyDeck);

        


        $board= new Board($player,$enemy);
       
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