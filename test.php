<?php

class User {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Compte {
    private $user;
    private $solde;

    public function __construct(User $user, $solde) {
        $this->user = $user;
        $this->solde = $solde;
    }

    public function deposer($montant) {
        $this->solde += $montant;
    }

    public function retirer($montant) {

            $this->solde -= $montant;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function getUser() {
        return $this->user;
    }
}

$user = new User("Ahmed");
$compte = new Compte($user, 300);

echo "Nom : " . $compte->getUser()->getName() . "<br>";
echo "Solde : " . $compte->getSolde();

?>`