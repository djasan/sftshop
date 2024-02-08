<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use App\Entity\Taille;
use App\Entity\Couleur;
use App\Entity\Paiement;
use App\Entity\Client;
use App\Entity\Admin;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création des tailles
        $tailleXS = new Taille();
        $tailleXS->setNom('XS');
        $manager->persist($tailleXS);

        $tailleS = new Taille();
        $tailleS->setNom('S');
        $manager->persist($tailleS);

        $tailleM = new Taille();
        $tailleM->setNom('M');
        $manager->persist($tailleM);

        $tailleL = new Taille();
        $tailleL->setNom('L');
        $manager->persist($tailleL);

        $tailleXL = new Taille();
        $tailleXL->setNom('XL');
        $manager->persist($tailleXL);

        $tailleXXL = new Taille();
        $tailleXXL->setNom('XXL');
        $manager->persist($tailleXXL);

        $tailleXXXL = new Taille();
        $tailleXXXL->setNom('XXXL');
        $manager->persist($tailleXXXL);

        // Création des couleurs
        $couleurBeige = new Couleur();
        $couleurBeige->setNom('Beige');
        $manager->persist($couleurBeige);

        $couleurBlanc = new Couleur();
        $couleurBlanc->setNom('Blanc');
        $manager->persist($couleurBlanc);

        $couleurBleu = new Couleur();
        $couleurBleu->setNom('Bleu');
        $manager->persist($couleurBleu);

        $couleurGris = new Couleur();
        $couleurGris->setNom('Gris');
        $manager->persist($couleurGris);

        $couleurJaune = new Couleur();
        $couleurJaune->setNom('Jaune');
        $manager->persist($couleurJaune);

        $couleurKaki = new Couleur();
        $couleurKaki->setNom('Kaki');
        $manager->persist($couleurKaki);

        $couleurMarron = new Couleur();
        $couleurMarron->setNom('Marron');
        $manager->persist($couleurMarron);

        $couleurNoir = new Couleur();
        $couleurNoir->setNom('Noir');
        $manager->persist($couleurNoir);

        $couleurOrange = new Couleur();
        $couleurOrange->setNom('Orange');
        $manager->persist($couleurOrange);

        $couleurRose = new Couleur();
        $couleurRose->setNom('Rose');
        $manager->persist($couleurRose);

        $couleurRouge = new Couleur();
        $couleurRouge->setNom('Rouge');
        $manager->persist($couleurRouge);

        $couleurVert = new Couleur();
        $couleurVert->setNom('Vert');
        $manager->persist($couleurVert);

        $couleurViolet = new Couleur();
        $couleurViolet->setNom('Violet');
        $manager->persist($couleurViolet);

        // Création des moyens de paiement
        $paiementCarte = new Paiement();
        $paiementCarte->setNom('Carte bancaire');
        $manager->persist($paiementCarte);

        $paiementCheque = new Paiement();
        $paiementCheque->setNom('Chèque');
        $manager->persist($paiementCheque);

        $paiementVirement = new Paiement();
        $paiementVirement->setNom('Virement');
        $manager->persist($paiementVirement);

        $paiementPrelevement = new Paiement();
        $paiementPrelevement->setNom('Prélèvement');
        $manager->persist($paiementPrelevement);

        $manager->flush();

        // Création des produits
        for ($i = 1; $i <= 30; $i++) {
            $produit = new Produit();
            $produit->setNom('Produit ' . $i);
            $produit->setPrix(mt_rand(10, 100));

            // Alternez entre les tailles XS et S
            $produit->setTaille($i % 2 === 0 ? $tailleXS : $tailleS);

            // Alternez entre les couleurs Rouge et Bleu
            $produit->setCouleur($i % 2 === 0 ? $couleurRouge : $couleurBleu);

            // Alternez entre les moyens de paiement Carte bancaire et Chèque
            $produit->setMoyenPaiement($i % 2 === 0 ? $paiementCarte : $paiementCheque);

            // Alternez entre les produits en ligne et hors ligne
            $produit->setOnline($i % 2 === 0);

            $manager->persist($produit);
        }

        // Création des utilisateurs
        $client = new Client();
        $client->setNom('NomClient');
        $client->setPrenom('PrenomClient');
        $client->setAge(25); // Remplacez par l'âge réel du client
        $client->setAdresse('AdresseClient');
        $client->setTelephone('0123456789'); // Remplacez par le numéro de téléphone réel du client
        $client->setEmail('client@example.com'); // Remplacez par l'email réel du client
        $client->setMotDePasse('motdepasseclient'); // Remplacez par le mot de passe réel du client

        // Création de l'admin
        $admin = new Admin();
        $admin->setNom('admin');
        $admin->setPrenom('admin');
        $admin->setEmail('admin@admin.com'); // Remplacez par l'email réel de l'admin
        $admin->setMotDePasse('admin'); // Remplacez par le mot de passe réel de l'admin

        $manager->persist($client);
        $manager->persist($admin);

        $manager->flush();
    }
}
