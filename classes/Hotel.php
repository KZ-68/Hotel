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

    public function getInfosHotel(){
        $roomsCount = count($this->_rooms);
        $reservationsCount = count($this->_reservations);
        $roomsAvailable = $roomsCount - $reservationsCount;

        return "<div style='font-size:20px'>".$this."</div><br/> ".
        $this->getAdress()." ".$this->getPostalCode()." ".strtoupper($this->_city)." <br/>
        Nombre de chambre : ".$roomsCount."<br/>
        Nombre de chambre réservées : ".$reservationsCount."<br/>
        Nombre de chambre disponibles :".$roomsAvailable."<br/>";
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
        
        foreach ($this->_reservations as $reservation) {
            $results .= $reservation->getClient()." - ".$reservation->getRoom()->getRoomNumber()." - ".$reservation->week();
        }

        return $results;
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
