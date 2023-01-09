<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/battlefield.css" type="text/css">
    <title>Fight</title>
</head>


<body>

    <?php
 require "./vendor/autoload.php";

    use Board\Board;
    use Board\MainCards\MainCards\PlayerCardFire\PlayerCardFire;
    use Board\MainCards\MainCards\PlayerCardWater\PlayerCardWater;

        $you=new PlayerCardWater;
        $notyou= new PlayerCardFire;
        $board= new Board($you,$notyou);
        do{
            $board->PlayTurn();
        }while(!false)
      

    ?>

</body>


</html>