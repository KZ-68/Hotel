<?php

class Hotel {
    // Attributs
    private string $_hotelName;
    private string $_hotelRating;
    private string $_adress;
    private string $_postalCode;
    private string $_city;
    private array $_rooms;
    private array $_reservations;

    // Constructeur
    public function __construct(string $hotelName, string $hotelRating, string $adress, string $postalCode, string $city) {
        $this->_hotelName = $hotelName;
        $this->_hotelRating = $hotelRating;
        $this->_adress = $adress;
        $this->_postalCode = $postalCode;
        $this->_city = $city;
        $this->_rooms = [];
        $this->_reservations = [];
    }
    
    // Méthodes
    public function __toString() {
        return $this->hotelTitle();
    }

    public function hotelTitle() {
        return " ".$this->_hotelName." ".$this->_hotelRating." ".$this->_city." "; // Fonction de concaténation du nom, du grade et de la ville de l'Hotel 
    }

    // Méthode pour afficher les informations de base d'un Hotel
    public function getInfosHotel(){
        $roomsCount = count($this->_rooms); // Compte le nombre de chambre de l'array $_rooms
        $reservationsCount = count($this->_reservations); // Compte le nombre de réservation de l'array $_reservations
        $roomsAvailable = $roomsCount - $reservationsCount; // Calcul du nombre de chambre disponible 

        return "<div style='font-size:20px'>".$this."</div><br/> ".
        $this->getAdress()." ".$this->getPostalCode()." ".strtoupper($this->_city)." <br/>
        Nombre de chambre : ".$roomsCount."<br/>
        Nombre de chambre réservées : ".$reservationsCount."<br/>
        Nombre de chambre disponibles : ".$roomsAvailable."<br/>";
    }

    // Méthode pour afficher les réservations d'un Hotel
    public function reservationHotel() {
        $results = "<div style='font-size:20px'>Réservation de $this</div>";

        $reservationNumber = count($this->_reservations); // Compte le nombre de réservations

        if ($reservationNumber == 0){ // En fonction du nbr de réservations, récupère la valeur de la variable et l'affiche
            $results .= "Aucune réservation ! <br/>";
        } else if ($reservationNumber == 1){
            $results .= "<div id='reservations'>$reservationNumber Réservation</div><br/>";
        } else $results .= "<div id='reservations'>$reservationNumber Réservations</div><br/>";
        
        // Accède à chaque réservation et récupère le __toString de l'objet Client, le numéro de chambre en accédant par chaînage de méthodes, et la fonction week() de l'Objet Réservation 
        foreach ($this->_reservations as $reservation) { 
            $results .= $reservation->getClient()." - ".$reservation->getRoom()->getRoomNumber()." - ".$reservation->week();
        }

        return $results;
    }

    public function displayStatusRoom() {
        echo "<div style='font-size:20px'>Status des chambres de $this</div>";
        // $display corresponds aux éléments qui vont être affiché en bootstrap
        $display = 
        // Création des colonnes du tableau
        "<table class='table status-table'></th>
        <thead>
        <tr>
            <th scope='col'>Chambre</th>
            <th scope='col'>Prix</th>
            <th scope='col'>Wifi</th>
            <th scope='col'>Etat</th>
        </tr>
        </thead>
        <tbody>";

        // Parcours de l'array $_rooms 
        foreach ($this->_rooms as $room) {
            $room->statusRoomWifi(); // Appel la méthode pour vérifier si la chambre a du wifi
            $room->roomAvailable(); // Appel la méthode pour vérifier si la chambre est disponible ou réservée 

            // Création des lignes du tableau
            $display .=
            "<tr>".
                "<th scope='row'>$room</th>".
                "<td>".$room->getPrice()."€</td>".
                "<td>".$room->statusRoomWifi()."</td>".
                "<td>".$room->roomAvailable()."</td>
            </tr>";
        }
       
        return $display;
    } 

    public function addRooms(Chambre $room) {
        $this->_rooms[] = $room;
    }

    public function addReservation(Réservation $reservation) {
        $this->_reservations[] = $reservation;
    } 
    
    // Getters et Setters
    public function getHotelName() {
        return $this->_hotelName;
    }

    public function setHotelName($hotelName) {
        $this->_hotelName = $hotelName;
    }

    public function getHotelRating() {
        return $this->_hotelRating;
    }

    public function setHotelRating($hotelRating) {
        $this->_hotelRating = $hotelRating;
    }

    public function getAdress() {
        return $this->_adress;
    }

    public function setAdress($adress) {
        $this->_adress = $adress;
    }

    public function getPostalCode() {
        return $this->_postalCode;
    }

    public function setPostalCode($postalCode) {
        $this->_postalCode = $postalCode;
    }

    public function getCity() {
        return $this->_city;
    }

    public function setCity($city) {
        $this->_city = $city;
    }
}
