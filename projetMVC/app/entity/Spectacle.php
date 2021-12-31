<?php
namespace app\entity;


class Spectacle{
    //attributs
    private string $titre;
    private string $date;
    private string $heure;
    private string $lieu;
    private string $image;
    private float $prix;
    private int $musique;
    //constructeur
    public function __construct(array $data){
        $this->hydrate($data);
    }

    //méthode hydrate
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method ='set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //getteurs
    public function getTitre(){
        return $this->titre;
    }

    public function getDate(){
        return $this->date;
    }

    public function getHeure(){
        return $this->heure;
    }

    public function getLieu(){
        return $this->lieu;
    }

    public function getImg(){
        return $this->image;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getMusique(){
        return $this->musique;
    }

    //setteurs
    public function setTitre($titre){
        $this->titre=$titre;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $heure
     */
    public function setHeure(string $heure): void
    {
        $this->heure = $heure;
    }

    /**
     * @param string $lieu
     */
    public function setLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @param int $musique
     */
    public function setMusique(int $musique): void
    {
        $this->musique = $musique;
    }


}

?>
