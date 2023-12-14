<?php
require_once '../config.php';
require 'EvenementC.php';

class RechercheC
{
    public function rechercherParDate($date)
    {
        $evenementController = new EvenementC();
        return $evenementController->searchEvenementByDate($date);
    }
}
?>
