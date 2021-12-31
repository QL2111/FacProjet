<?php
namespace app\entity;

class Musique{
    private int $id_musique;
    private string $designation;
    private int $id_compositeur;
    private string $audio;

    /**
     * @return int
     */
    public function getIdMusique(): int
    {
        return $this->id_musique;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @return int
     */
    public function getIdCompositeur(): int
    {
        return $this->id_compositeur;
    }

    /**
     * @return string
     */
    public function getAudio(): string
    {
        return $this->audio;
    }


    /**
     * @param int $id_musique
     */
    public function setIdMusique(int $id_musique): void
    {
        $this->id_musique = $id_musique;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @param int $id_compositeur
     */
    public function setIdCompositeur(int $id_compositeur): void
    {
        $this->id_compositeur = $id_compositeur;
    }

    /**
     * @param string $audio
     */
    public function setAudio(string $audio): void
    {
        $this->audio = $audio;
    }


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    public function hydrate(array $donnees) : void
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);

            }
        }
    }

    public function __toString()
    {
        return $this->designation;
    }

}

?>