<?php

class Chambre  {
    private string $_roomNumber;
    private int $_bedNumber;
    private int $_price;
    private bool $_isWifi;
    private bool $_isAvailable;
    private Hotel $_hotel;
    private array $_reservations;
    
    public function __construct(string $roomNumber, int $bedNumber, int $price, bool $isWifi, bool $isAvailable, Hotel $hotel) {
        $this->_roomNumber = $roomNumber;
        $this->_bedNumber = $bedNumber;
        $this->_price = $price;
        $this->_isWifi = $isWifi;
        $this->_isAvailable = $isAvailable;
        $this->_hotel = $hotel;
        $this->_hotel->addRooms($this);
        $this->_reservations = [];
    }

    public function __toString() {
        return $this->_roomNumber;
    }

    public function statusRoomWifi() {
        if ($this->_isWifi) {
            return "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' transform='rotate(45deg)' class='bi-wifi' viewBox='0 0 16 16'>
            <path d='M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z'/>
            <path d='M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z'/>
          </svg>";
        } else {
            return "non";
        }
    }

    public function roomAvailable() {
        if ($this->_isAvailable == true) {
            return "<div id='available'>DISPONIBLE</div>";
        } else if ($this->_isAvailable === null)
            return "<div id='available'>DISPONIBLE</div>";
        else {
            $this->_isAvailable = false;
            return "<div id='occupied'>RESERVEE</div>";
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