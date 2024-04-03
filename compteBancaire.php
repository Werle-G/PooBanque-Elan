<?php
class CompteBancaire{
    public $libelle;
    public $solde;
    public $debit;
    public $devise;
    public $titulaire;

    public function __construct($libelle, $solde, $devise, $debit, Titulaire $titulaire) {
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->debit = $debit;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->ajouterCompte($this);
    }
    //--------------Getters---------------
    public function getLibelle(){
        return $this->libelle;
    }
    public function getSolde(){
        return $this->solde;
    }
    public function getDebit(){
        return $this->debit;
    }
    public function getDevise(){
        return $this->devise;
    }
    public function getTitulaire(){
        return $this->titulaire;
    }

    //-------------Setters--------------
    public function setLibelle($libelle){
        $this->libelle = $libelle;
    }
    public function setSolde($solde){
        $this->solde = $solde;
    }
    public function setDebit($debit){
        $this->debit = $debit;
    }
    public function setDevise($devise){
        $this->devise = $devise;
    }
    public function setTitulaire($titulaire){
        $this->titulaire = $titulaire;
    }

    //---------------Méthode------------
    public function crediter($somme){
        $this->solde += $somme;
    }

    public function debiter($somme){
        if ($this->solde - $somme >= $this->debit){
            $this->solde -= $somme;
        } else {
            echo "Solde insuffisant, débit maximum autorisé : $this->debit Euros .<br>";
        }
    }

    public function virement(CompteBancaire $other, $somme){
        if ($this->solde - $somme >= $this->debit) {
            $this->debiter($somme);
            $other->crediter($somme);

        } else {
            echo "Solde insuffisant. Virement impossible.<br>";
        }
    }

    public function afficherInfo() {
        echo "Compte : {$this->libelle}, Solde : {$this->solde}  {$this->devise} , Débit autorisé {$this->debit} , ||";
        echo " Titulaire Compte : {$this->titulaire->prenom} {$this->titulaire->nom}<br>";
    }
}

?>