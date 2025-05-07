<?php

declare(strict_types=1);

namespace BCaruso\Creation\Singleton;

/**
 * Classe Employe
 */
class Employe
{
    public function __construct(
        private readonly string $id,
        private readonly string $nom,
        private string $poste
    ) { }

// Getters et setters
    public function getId(): string
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPoste(): string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): void
    {
        $this->poste = $poste;
    }
}

// Exemple d'utilisation
// Accès au DepartementRH via le singleton
$rh = DepartementRH::getInstance();

// Ajout d'employés
$rh->ajouterEmploye(new Employe("E001", "Marc Jambon", "Développeuse"));
$rh->ajouterEmploye(new Employe("E002", "Linus Tartin", "Chef de projet"));
$rh->ajouterEmploye(new Employe("E003", "Sophie Leclerc", "Designer UX"));
$rh->ajouterEmploye(new Employe("E004", "Alice Dupont", "Analyste"));
$rh->ajouterEmploye(new Employe("E005", "Bob Martin", "Administrateur système"));
$rh->ajouterEmploye(new Employe("E006", "Charlie Sheen", "Développeur front-end"));
$rh->ajouterEmploye(new Employe("E007", "Mickael Prince", "Développeuse back-end"));
$rh->ajouterEmploye(new Employe("E008", "Ethan Hunt", "Testeur QA"));
$rh->ajouterEmploye(new Employe("E009", "Fiona Apple", "Responsable marketing"));

echo "Nombre d'employés : " . $rh->getNombreEmployes() . "\n";

// Accès au même département RH depuis une autre partie de l'application
$memeRH = DepartementRH::getInstance();
echo "Est-ce la même instance ? " . ($rh === $memeRH ? "Oui" : "Non") . "\n";

// Ajout d'un employé via la deuxième référence
$memeRH->ajouterEmploye(new Employe("E003", "Sophie Leclerc", "Designer UX"));

// Vérification que tous les employés sont accessibles via la première référence
echo "Nombre total d'employés : " . $rh->getNombreEmployes() . "\n";
?>