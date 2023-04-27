<?php

class Réservation {
    private DateTime $_dateArrived;
    private DateTime $_dateDeparture;
    private Client $_client;
    private Chambre $_room;

    private static int $_reservationCount = 0;

    public function __construct(string $dateArrived, string $dateDeparture, Client $client, Chambre $room) {
        $this->_dateArrived = new DateTime($dateArrived);
        $this->_dateDeparture = new DateTime($dateDeparture);
        $this->_client = $client;
        $this->_room = $room;

        $this->_client->addReservation($this);
        $this->_room->addReservation($this); 

        self::$_reservationCount++;
    }

    public function week() {
        return " du ".$this->_dateArrived->format("d.m.Y")." au ".$this->_dateDeparture->format("d.m.Y")."<br/>";
    }
    
    public function calculPrice(){ // Calcul du prix en partant du nombre de jours réservés. 

        $reservationDuration = $this->_dateArrived->diff($this->_dateDeparture); // Calcul du nombres de jours réservés. 

        if ($reservationDuration->d == 0)  { // Si le nombre de jours réservés est de 0, alors on sort juste le prix de la chambre.
            $price = $this->getRoom()->getPrice();
        } 
        else {
            $price = $this->getRoom()->getPrice() * $reservationDuration->d; // Sinon, on multiplie par le nombre de jours sinon il y a multiplication par 0.
        }
        
        return $price ;
    }

    public static function getReservationCount() {
        echo self::$_reservationCount++;
    }

    public function getDateArrived(){
        return $this->_dateArrived;
    }

    public function setDateArrived($dateArrived) {
        $this->_dateArrived = new DateTime($dateArrived);
    }

    public function getDateDeparture() {
        return $this->_dateDeparture;
    }

    public function setDateDeparture($dateDeparture) {
        $this->_dateDeparture = new DateTime($dateDeparture);
    }

    public function getClient() {
        return $this->_client;
    }

    public function setClient($client) {
        $this->_client = $client;
    }

    public function getRoom() {
        return $this->_room;
    }

    public function setRoom($room) {
        $this->_room = $room;
    }

}