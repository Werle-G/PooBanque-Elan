<?php
class Titulaire{
    public $nom;
    public $prenom;
    public DateTime $born;
    public $ville;
    public $comptes = [];

    public function __construct($nom, $prenom, $born, $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->born = new DateTime($born);
        $this->ville = $ville;
    }
    //--------------Getters---------------
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getBorn(){
        return $this->born;
    }
    public function getVille(){
        return $this->ville;
    }

    //-------------Setters--------------
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setBorn($born){
        $this->born = new DateTime($born);
    }
    public function setVille($ville){
        $this->ville = $ville;
    }

    public function ajouterCompte(CompteBancaire $compte) {
        $this->comptes[] = $compte;
    }

    public function afficherInformations() {

        $age = $this->born->diff(new DateTime())->y;
        
        echo "Titulaire : {$this->prenom} {$this->nom}, {$this->born->format("d/m/Y")}, $age ans, Ville : {$this->ville}<br>";
       
        foreach ($this->comptes as $compte) {
            $compte->afficherInfo();
        }
    }

}



?>