<?php
namespace app\entity;

    class  Reservations{
        private int $id_commande;
        private int $id_client;
        private float $prix_total;
        private string $date;

        /**
         * @return int
         */
        public function getIdCommande(): int
        {
            return $this->id_commande;
        }

        /**
         * @return int
         */
        public function getIdClient(): int
        {
            return $this->id_client;
        }

        /**
         * @return float
         */
        public function getPrixTotal(): float
        {
            return $this->prix_total;
        }

        /**
         * @return string
         */
        public function getDate(): string
        {
            return $this->date;
        }

        /**
         * @param int $id_commande
         */
        public function setIdCommande(int $id_commande): void
        {
            $this->id_commande = $id_commande;
        }

        /**
         * @param int $id_client
         */
        public function setIdClient(int $id_client): void
        {
            $this->id_client = $id_client;
        }

        /**
         * @param float $prix_total
         */
        public function setPrixTotal(float $prix_total): void
        {
            $this->prix_total = $prix_total;
        }

        /**
         * @param string $date
         */
        public function setDate(string $date): void
        {
            $this->date = $date;
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
            return $this->id_commande." Le ".$this->date;


        }

    }
?>
