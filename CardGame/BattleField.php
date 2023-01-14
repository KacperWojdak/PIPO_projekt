<?php
require "./vendor/autoload.php";

use Game\Board\Log;
use Game\Board\Deck;
use Game\Board\Board;
use Game\Board\MainCards\PlayerCardAir;
use Game\Board\MainCards\PlayerCardFire;
use Game\Board\MainCards\PlayerCardEarth;
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
    Log::info("Wybierz swoją talię: ") . PHP_EOL;
    Log::info("1 - Talia żywiołu wody") . PHP_EOL;
    Log::info("2 - Talia żywiołu ognia") . PHP_EOL;
    Log::info("3 - Talia żywiołu ziemi") . PHP_EOL;
    Log::info("4 - Talia żywiołu powietrza") . PHP_EOL;


        $playerChoose = readline("");
            if ($playerChoose == 1) {
                $playerChoose = new PlayerCardWater;
            }
            else if ($playerChoose == 2) {
                $playerChoose = new PlayerCardFire;
            }
            else if ($playerChoose == 3) {
                $playerChoose = new PlayerCardEarth;
            }
            else if ($playerChoose == 4) {
                $playerChoose = new PlayerCardAir;
            }

    Log::info("Wybierz talię przeciwnika: ") . PHP_EOL;
        $enemyChoose = readline("");

        if ($enemyChoose == 1) {
            $enemyChoose = new PlayerCardWater;
        }
        else if ($enemyChoose == 2) {
            $enemyChoose = new PlayerCardFire;
        }
        else if ($enemyChoose == 3) {
            $enemyChoose = new PlayerCardEarth;
        }
        else if ($enemyChoose == 4) {
            $enemyChoose = new PlayerCardAir;
        }
       
        $playerDeck = new Deck($playerChoose->GetPlayerType());
        $enemyDeck = new Deck($enemyChoose->GetPlayerType());

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