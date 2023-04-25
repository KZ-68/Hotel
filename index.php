<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./main.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>
<body>
<h1>Exercice 4 - POO</h1>
    
    <h2>Résultat</h2>

    <?php

    spl_autoload_register(function ($class_name) {
        require 'classes/'. $class_name . '.php';
    });

    $hotel1 = new Hotel("Hilton", "****", "10 route de la gare", "67000", "Strasbourg");
    $client1 = new Client("Virgile","GIBELLO");
    $client2 = new Client("Micka", "MURMANN");
    $room1 = new Chambre("Chambre 1", 2, 120, false, false, $hotel1);  
    $room2 = new Chambre("Chambre 2", 2, 120, false, false, $hotel1);
    $room3 = new Chambre("Chambre 3", 2, 120, false, true, $hotel1);
    $room4 = new Chambre("Chambre 4", 2, 120, false, true, $hotel1);
    $room16 = new Chambre("Chambre 16", 2, 300, false, false, $hotel1);
    $room17 = new Chambre("Chambre 17", 2, 300, false, true, $hotel1);
    $room18 = new Chambre("Chambre 18", 2, 300, false, false, $hotel1);
    $room19 = new Chambre("Chambre 19", 2, 300, false, false, $hotel1);  
    $reservation1 = new Réservation("01-01-2021", "01-01-2021", $client1, $room1);
    $reservation2 = new Réservation ("11-03-2021", "15-03-2021", $client2, $room3);
    $reservation2 = new Réservation ("01-04-2021", "17-04-2021", $client2, $room4);
    
    echo $hotel1->getInfosHotel();
    Chambre::displayNumberRoom();
    echo $client2->clientReservation();

    ?>
</body>
</html>