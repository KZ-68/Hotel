<?php

class Chambre  {
    // Attributs
    private string $_roomNumber;
    private int $_bedsCount; // bedsCount
    private int $_price;
    private bool $_hasWifi; // hasWifi
    private bool $_isAvailable;
    private Hotel $_hotel;
    private array $_reservations;
    
    // Constructeur
    public function __construct(string $roomNumber, int $bedsCount, int $price, bool $hasWifi, bool $isAvailable, Hotel $hotel) {
        $this->_roomNumber = $roomNumber;
        $this->_bedsCount = $bedsCount;
        $this->_price = $price;
        $this->_hasWifi = $hasWifi;
        $this->_isAvailable = $isAvailable;
        $this->_hotel = $hotel;
        $this->_hotel->addRooms($this);
        $this->_reservations = [];
    }

    // Méthodes
    public function __toString() {
        return $this->_roomNumber;
    }

    // Méthodes pour afficher l'icône Wifi si la chambre en dispose ou pas 
    public function getWifiStringRepresentation() { // getWifiStringRepresentation
        if ($this->_hasWifi) {
            return "oui";
        } else {
            return "non";
        }
    }

    public function getRoomAvailabilityRepresentation() { // getRoomAvailabilityRepresentation
        if ($this->_isAvailable == true) {
            return "<span class='badge bg-success'>DISPONIBLE</span>";
        } else if ($this->_isAvailable === null)
            return "<span class='badge bg-success'>DISPONIBLE</span>";
        else {
            $this->_isAvailable = false;
            return "<span class='badge bg-danger'>RÉSERVÉE</span>";
        }
    }

    public function addReservation(Réservation $reservation) {
        $this->_reservations[] = $reservation; // array push de Réservation 
    }

    public function getRoomNumber() {
        return $this->_roomNumber;
    }

    public function setRoomNumber($roomNumber) {
        $this->_roomNumber = $roomNumber;
    }

    public function getBedsCount() {
        return $this->_bedsCount;
    }

    public function setBedsCount($bedsCount) {
        $this->_bedsCount = $bedsCount;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function setPrice($price) {
        $this->_price = $price;
    }

    public function getHasWifi() {
        return $this->_hasWifi;
    }

    public function setHasWifi($hasWifi) {
        $this->_hasWifi = $hasWifi;
    }

    public function getIsAvailable() {
        return $this->_isAvailable;
    }

    public function setIsAvailable($isAvailable) {
        $this->_isAvailable = $isAvailable;
    }

    public function getHotel() {
        return $this->_hotel;
    }

    public function setHotel() {
        $this->_hotel = $hotel;
    }

  
}