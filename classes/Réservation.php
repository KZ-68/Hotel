<?php

class Réservation {
    private DateTime $_dateArrived;
    private DateTime $_dateDeparture;
    private Client $_client;
    private Chambre $_room;

    public function __construct(string $dateArrived, string $dateDeparture, Client $client, Chambre $room) {
        $this->_dateArrived = new DateTime($dateArrived);
        $this->_dateDeparture = new DateTime($dateDeparture);
        $this->_client = $client;
        $this->_room = $room;

        $this->_client->addReservation($this);
        $this->_room->addReservation($this); 
    }

    public function week() {
        return " du ".$this->_dateArrived->format("d.m.Y")." au ".$this->_dateDeparture->format("d.m.Y")."<br/>";
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