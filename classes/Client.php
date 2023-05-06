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

    // Méthode pour afficher les réservations d'un Client
    public function getClientReservation() {
        $results = "<div style='font-size:20px'>Réservation de $this</div>";
        
        $reservationsCount = count($this->_reservations); // Compte le nombre de réservations
        
        if ($reservationsCount == 0) { // En fonction du nbr de réservations, récupère la valeur de la variable et l'affiche
            $results .= "Aucune réservation !";
        } else {
            $results .= "<span class='badge bg-success'>$reservationsCount RÉSERVATION" . ($reservationsCount >= 2 ? "S" : "") . "</span><br/>";
        }

        $priceTotal = 0; // Initialise une variable pour le prix total des réservations
        
        foreach ($this->_reservations as $reservation) {
            $results .= $reservation->getRoom()->getHotel(). " / ".$reservation->getRoom()->getRoomNumber()." (".$reservation->getRoom()->getBedsCount()." lits - ".$reservation->getRoom()->getPrice(). " € - Wifi : ".$reservation->getRoom()->getWifiStringRepresentation().") ".$reservation->week()."";
            $priceTotal += $reservation->calculPrice(); // Attribut la valeur de la fonction calculPrice de l'objet Réservation
        }

        $results .= "Total : $priceTotal €<br/>";

        return $results;
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