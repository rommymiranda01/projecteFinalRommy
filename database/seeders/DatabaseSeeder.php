<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\Temporada;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = new User();
        $user->name='admin';
        $user->password=Hash::make('admin');
        $user->email='admin@admin.com';
        $user->rol='admin';
        $user->save();

        $user = new User();
        $user->name='rommy';
        $user->password=Hash::make('123456789');
        $user->email='rommy.miranda@cirvianum.cat';
        $user->rol='user';
        $user->save();

        $team = new Team();
        $team->nom_equip='Is Manlleu';
        $team->logo='1.PNG';
        $team->save();

        $team = new Team();
        $team->nom_equip='Is Torello';
        $team->logo='2.PNG';
        $team->save();

        $team = new Team();
        $team->nom_equip='Is Roda';
        $team->logo='3.PNG';
        $team->save();

        $team = new Team();
        $team->nom_equip='Is Vic';
        $team->logo='4.PNG';
        $team->save();

        $temporada = new Temporada();
        $temporada->any_temporada=2023;
        $temporada->save();
    }
}
