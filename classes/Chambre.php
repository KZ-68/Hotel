<?php

class Chambre  {
    private string $_roomNumber;
    private int $_bedNumber;
    private int $_price;
    private bool $_isWifi;
    private bool $_isAvailable;
    private Hotel $_hotel;
    private array $_reservations;

    private static int $_roomCount = 0; // Fonction Statique pour le nombre de Chambre
    
    public function __construct(string $roomNumber, int $bedNumber, int $price, bool $isWifi, bool $isAvailable, Hotel $hotel) {
        $this->_roomNumber = $roomNumber;
        $this->_bedNumber = $bedNumber;
        $this->_price = $price;
        $this->_isWifi = $isWifi;
        $this->_isAvailable = $isAvailable;
        $this->_hotel = $hotel;
        $this->_hotel->addRooms($this);
        $this->_reservations = [];

        self::$_roomCount++; // Incrémentation du nombre de chambre à chaque nouvel objet 
    }

    public function __toString() {
        return "".$this->_hotel->getHotelName()." ".$this->_hotel->getHotelRating()." ".$this->_hotel->getCity(). " / ".$this->_roomNumber." (".$this->_bedNumber." lits - ".$this->_price." € - Wifi : ".$this->roomWifi().")";
    } 

    public function roomWifi() {
        if ($this->_isWifi) {
            return "oui";
        } else {
            return "non";
        }
    }

    public function roomAvailable() {
        if ($this->_isAvailable) {
            return "<div id='available'>DISPONIBLE</div>";
        } else {
            return "<div id='occupied'>RESERVEE</div>";
        }
    }

    public function addReservation(Réservation $reservation) {
        $this->_reservations[] = $reservation; // array push de Réservation 
    }

    public static function displayNumberRoom() {
        echo "Nombre de chambres : ".self::$_roomCount.""; // Affichage du nombre de chambre 
    }

    public function getRoomNumber() {
        return $this->_roomNumber;
    }

    public function setRoomNumber($roomNumber) {
        $this->_roomNumber = $roomNumber;
    }

    public function getBedNumber() {
        return $this->_bedNumber;
    }

    public function setBedNumber($bedNumber) {
        $this->_bedNumber = $bedNumber;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function setPrice($price) {
        $this->_price = $price;
    }

    public function getIsWifi() {
        return $this->_isWifi;
    }

    public function setIsWifi($isWifi) {
        $this->_isWifi = $isWifi;
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