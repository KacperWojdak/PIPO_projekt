<?php
require "./vendor/autoload.php";

use Game\Board\Log;
use Game\Board\Deck;
use Game\Board\Board;
use Game\Board\MainCards\PlayerCardAir;
use Game\Board\MainCards\PlayerCardFire;
use Game\Board\MainCards\PlayerCardEarth;
use Game\Board\MainCards\PlayerCardWater;
use Game\Board\MainCards\Interfaces\PlayerInterface;

class WinnerWasCalled extends Exception{}


    Log::info("Choose your deck: ") . PHP_EOL;
    Log::info("1 - \e[34mWater Elemental Deck\e[0m") . PHP_EOL;
    Log::info("2 - \e[91mFire Elemental Deck\e[0m") . PHP_EOL;
    Log::info("3 - \e[92mAir Elemental Deck\e[0m") . PHP_EOL;
    Log::info("4 - \e[33mEarth Elemental Deck\e[0m") . PHP_EOL;


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

    Log::info("Choose opponent's deck: ") . PHP_EOL;
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

        $playerDeck->CreateDeck();
        $enemyDeck->CreateDeck();
        
        
        $playerChoose->SetDeck($playerDeck);
        $enemyChoose->SetDeck($enemyDeck);

        $board = new Board($playerChoose, $enemyChoose);
        try {
            while(true) {
                $board->PlayTurn();
            }
        }
        catch (WinnerWasCalled $exception) {
            Log::info();
            Log::info($board->GetWinner() . " won.");
        }
?>

