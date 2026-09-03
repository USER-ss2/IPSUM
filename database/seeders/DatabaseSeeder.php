<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Incident;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Admin123!',
            'profil' => 'admin',
        ]);

        Incident::create([
            'num' => 'INC000001',
            'WFID' => 1,
            'date_ouverture' => '2026-09-01',
            'date_cloture' => '2026-09-01',
            'date_resolution' => '2026-09-01',
            'phase' => 'Résolution',
            'etat' => 'Clôturé',
            'categorie_reclamation' => 'Technique',
            'region' => 'Tunis',
            'solution' => 'Redémarrage du serveur',
            'domaine' => 'Réseau',
            'sous_domaine' => 'Connexion',
            'groupe_resolu' => 'Support IT',
            'incident_Src' => 'Téléphone',
            'lhType' => 'Incident',
            'groupe_affectation' => 'Niveau 1',
            'csc' => 'CSC Tunis',
            'zone' => 'Zone Nord',
            'groupe_cloture' => 'Support IT',
        ]);

        Incident::create([
            'num' => 'INC000002',
            'WFID' => 2,
            'date_ouverture' => '2026-09-02',
            'date_cloture' => '2026-09-02',
            'date_resolution' => '2026-09-02',
            'phase' => 'Diagnostic',
            'etat' => 'Encours',
            'categorie_reclamation' => 'Logiciel',
            'region' => 'Ariana',
            'solution' => 'en cours de résolution',
            'domaine' => 'Application',
            'sous_domaine' => 'Authentification',
            'groupe_resolu' => 'Support Application',
            'incident_Src' => 'Email',
            'lhType' => 'Incident',
            'groupe_affectation' => 'Niveau 2',
            'csc' => 'CSC Ariana',
            'zone' => 'Zone Nord',
            'groupe_cloture' => 'Support Application',
        ]);

        Incident::create([
            'num' => 'INC000003',
            'WFID' => 3,
            'date_ouverture' => '2026-09-02',
            'date_cloture' => '2026-09-02',
            'date_resolution' => '2026-09-02',
            'phase' => 'Clôture',
            'etat' => 'Clôturé',
            'categorie_reclamation' => 'Matériel',
            'region' => 'Sfax',
            'solution' => 'Remplacement du matériel défectueux',
            'domaine' => 'Poste de travail',
            'sous_domaine' => 'Ordinateur',
            'groupe_resolu' => 'Support Hardware',
            'incident_Src' => 'Portail',
            'lhType' => 'Incident',
            'groupe_affectation' => 'Niveau 1',
            'csc' => 'CSC Sfax',
            'zone' => 'Zone Sud',
            'groupe_cloture' => 'Support Hardware',
        ]);
    }
}
