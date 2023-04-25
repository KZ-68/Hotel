<?php

class Client {
    private string $_clientFirstName;
    private string $_clientLastName;
    private array $_reservations;

    public function __construct(string $clientFirstName, string $clientLastName) {
        $this->_clientFirstName = $clientFirstName;
        $this->_clientLastName = $clientLastName;
        $this->_reservations = [];
    }

    public function addReservation(Réservation $reservation) {
        $this->_reservations[] = $reservation;
    }

    public function __toString() {
        return $this->getNomComplet(); 
    }
    public function clientReservation() {
        $result = "<p>Réservation de $this</p>";
        foreach ($this->_reservations as $reservation) {
            $result .= $reservation->getRoom(). $reservation->week()."<br/>";
        }
        return $result;
    }

    public function getNomComplet() {
        return "".$this->_clientFirstName." ".$this->_clientLastName."";
    }

    public function getClientFirstName() {
        return $this->_clientFirstName;
    }

    public function setClientFirstName($clientFirstName) {
        $this->_clientFirstName = $clientFirstName;
    }

    public function getClientLastName() {
        return $this->_clientLastName;
    }

    public function setClientLastName($clientLastName) {
        $this->_clientLastName = $clientLastName;
    }
}