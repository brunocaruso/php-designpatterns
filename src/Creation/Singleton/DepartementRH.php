<?php

declare(strict_types=1);

namespace BCaruso\Creation\Singleton;

/**
 * Classe DepartementRH utilisant le pattern Singleton.
 *
 * Cette classe gère tous les employés de l'entreprise et assure
 * qu'il n'existe qu'une seule instance du département RH
 */
class DepartementRH
{
    // L'instance unique de la classe
    private static ?DepartementRH $instance = null;

    // Liste des employés de l'entreprise
    private array $employes = [];

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {
        echo "Initialisation du département RH\n";
    }

    // Empêche le clonage de l'instance
    private function __clone()
    {
    }

    // Empêche la désérialisation de l'instance
    private function __wakeup()
    {
    }

    /**
     * Récupère l'instance unique de la classe DepartementRH.
     *
     * Cette méthode implémente le modèle de conception Singleton en s'assurant qu'une seule
     * instance de la classe DepartementRH existe à tout moment de l'application.
     *
     * Si l'instance n'existe pas encore, elle est créée lors du premier appel (initialiastion différée)
     * Les appels suivants retourneront la même instance, garantissant ainsi l'unicité de l'objet.
     *
     * @return self L'instance unique de la classe DepartementRH
     *
     * @since 1.0.0
     * @see DepartementRH::__construct() Le constructeur privée appelé lors de l'initiatisation
     * @example
     * // Obtenir l'instance du département RH
     * $departementRH = DepartementRH::getInstance();
     */
    public static function getInstance(): self
    {
        // Création de l'instance si elle n'existe pas encore (lazy initialization)
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Méthode de gestion des employés
    public function ajouterEmploye(Employe $employe): void
    {
        $this->employes[] = $employe;
        echo "Employé ajouté : " . $employe->getNom() . "\n";
    }

    public function supprimerEmploye(Employe $employe): void
    {
        $key = array_search($employe, $this->employes, true);

        if ($key !== false) {
            unset($this->employes[$key]);

            // Recréer un tableau sans trous d'index
            $employes = [];
            foreach ($this->employes as $value) {
               if($value !== null) {
                   $employe [] = $value;
               }
            }

            $this->employes = $employes;

            echo "Employé supprimé : " . $employe->getNom() . "\n";
        }
    }

    public function getEmployes(): array
    {
        return $this->employes;
    }

    public function getNombreEmployes(): int
    {
        return count($this->employes);
    }
}