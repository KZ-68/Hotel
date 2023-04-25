<?php

class Hotel {
    // Attributs
    private string $_hotelName;
    private string $_hotelRating;
    private string $_adress;
    private string $_postalCode;
    private string $_city;
    private array $_rooms;

    // Constructeur
    public function __construct(string $hotelName, string $hotelRating, string $adress, string $postalCode, string $city) {
        $this->_hotelName = $hotelName;
        $this->_hotelRating = $hotelRating;
        $this->_adress = $adress;
        $this->_postalCode = $postalCode;
        $this->_city = $city;
        $this->_rooms = [];
    }
    
    // Méthodes
    public function __toString() {
        return "<div style='font-size:20px'>".$this->_hotelName." ".$this->_hotelRating." ".$this->_city."</div><br/>";
    }

    public function getInfosHotel(){
        
        return $this." ".
        $this->_adress." ".$this->_postalCode." ".strtoupper($this->_city)." <br/>";
    }

    public function addRooms(Chambre $room) {
        $this->_rooms[] = $room;
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
