<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./main.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076e75914.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
<h1>POO Hotel</h1>
    
<p>A partir de ces captures d’écran, réaliser l’application en POO permettant la gestion de réservations<br/> 
de chambres par des clients dans différents hôtels:</p>
</header>
    <main>
        <h2>Résultat</h2>

        <?php

        spl_autoload_register(function ($class_name) {
            require 'classes/'. $class_name . '.php';
        });

        $hotel1 = new Hotel("Hilton", "****", "10 route de la gare", "67000", "Strasbourg");
        $hotel2 = new Hotel("Regent", "***", "61 rue Dauphine", "75006", "Paris");
        
        $client1 = new Client("Virgile","GIBELLO");
        $client2 = new Client("Micka", "MURMANN");
        
        $room1 = new Chambre("Chambre 1", 2, 120, false, false, $hotel1);  
        $room2 = new Chambre("Chambre 2", 2, 120, false, false, $hotel1);
        $room3 = new Chambre("Chambre 3", 2, 120, false, true, $hotel1);
        $room4 = new Chambre("Chambre 4", 2, 120, false, true, $hotel1);
        $room16 = new Chambre("Chambre 16", 2, 300, true, false, $hotel1);
        $room17 = new Chambre("Chambre 17", 2, 300, true, true, $hotel1);
        $room18 = new Chambre("Chambre 18", 2, 300, true, false, $hotel1);
        $room19 = new Chambre("Chambre 19", 2, 300, true, false, $hotel1);  
        
        $reservation1 = new Réservation("01-01-2021", "01-01-2021", $client1, $room1);
        $reservation2 = new Réservation ("11-03-2021", "15-03-2021", $client2, $room3);
        $reservation2 = new Réservation ("01-04-2021", "17-04-2021", $client2, $room4);
        
        echo $hotel1->getInfos();
        echo "<br/>";
        echo $hotel1->getInfosReservations();
        echo "<br/>";
        echo $hotel2->getInfosReservations();
        echo "<br/>";
        echo $client2->getClientReservation();
        echo "<br/>";
        echo $hotel1->displayStatusRoom();

        ?>
    </main>
</body>
</html>