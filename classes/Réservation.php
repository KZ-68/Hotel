<?php

class Réservation {
    private DateTime $_dateArrived;
    private DateTime $_dateDeparture;
    private Client $_client;
    private Chambre $_room;

    public function __construct(string $dateArrived, string $dateDeparture, Client $client, Chambre $room) {
        $hotel = $room->getHotel(); // Récupère les informations du __toString de Hotel par l'argument $room de l'objet Chambre
        
        $this->_dateArrived = new DateTime($dateArrived);
        $this->_dateDeparture = new DateTime($dateDeparture);
        $this->_client = $client;
        $this->_room = $room;

        $this->_client->addReservation($this); // Array push de l'objet Client 
        $this->_room->addReservation($this); // Array push de l'objet Chambre
        $hotel->addReservation($this); // Array push de l'objet Hotel en passant par l'objet Chambre
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