<?php

// class User {
//     private $name;

//     public function __construct($name) {
//         $this->name = $name;
//     }

//     public function getName() {
//         return $this->name;
//     }
// }

// class Compte {
//     private $user;
//     private $solde;

//     public function __construct(User $user, $solde) {
//         $this->user = $user;
//         $this->solde = $solde;
//     }

//     public function deposer($montant) {
//         $this->solde += $montant;
//     }

//     public function retirer($montant) {

//             $this->solde -= $montant;
//     }

//     public function getSolde() {
//         return $this->solde;
//     }

//     public function getUser() {
//         return $this->user;
//     }
// }

// $user = new User("Ahmed");
// $compte = new Compte($user, 300);

// echo "Nom : " . $compte->getUser()->getName() . "<br>";
// echo "Solde : " . $compte->getSolde();



class User{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function get_id(){
        return $this->id;
    }
}

class Colocation{
    private string $name;
    private array $users = [];

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function addMember(User $user){
        echo "Added";
        $this->users[] = $user;
    }

    public function removeMember(User $user){
        echo "Removed";
        $this->users = array_filter($this->users, fn (User $u) => $user->get_id() !== $u->get_id() );
    }

    public function countMembers(){
        return count($this->users);
    }
}

$u1 = new User(1);
$u2 = new User(2);

$colocation = new Colocation();
$colocation->setName("c1");
$colocation->addMember($u1);
$colocation->addMember($u2);
$colocation->removeMember($u2);
echo $colocation->countMembers();