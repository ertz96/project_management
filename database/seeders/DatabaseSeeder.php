<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Anzahl der Benutzer, Projekte und Aufgaben
        $userCount = 10; // Anzahl der Benutzer
        $additionalProjects = 5; // Zusätzliche Projekte (ohne direkte Zuordnung)

        // Dummy-Daten für Benutzer
        $users = User::factory($userCount)->create();

        // Jeder Benutzer bekommt mindestens ein Projekt und eine Aufgabe
        foreach ($users as $user) {
            // Projekt für den Benutzer erstellen
            $project = Project::factory()->create();
            $project->users()->attach($user->id); // Benutzer dem Projekt hinzufügen

            // Aufgabe für den Benutzer und das Projekt erstellen
            Task::factory()->create([
                'user_id' => $user->id,
                'project_id' => $project->id,
            ]);
        }

        // Zusätzliche Projekte erstellen
        $additionalProjects = Project::factory($additionalProjects)->create();

        // Aufgaben für zusätzliche Projekte zufällig erstellen
        foreach ($additionalProjects as $project) {
            Task::factory(rand(1, 5))->create([
                'project_id' => $project->id,
                'user_id' => $users->random()->id, // Zufälligen Benutzer zuweisen
            ]);

            // Zusätzliche Benutzer mit Projekten verbinden
            $project->users()->attach(
                $users->random(rand(1, $userCount))->pluck('id')->toArray()
            );
        }

        // Create an admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com', // Use a valid email
            'password' => bcrypt('password'), // Use a secure password
            // Add any other fields required by your User model
        ]);
    }
}
