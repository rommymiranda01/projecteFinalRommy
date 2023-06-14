<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jornada;
use App\Models\Jugador;
use App\Models\Partit;
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

        $jornada = new Jornada();
        $jornada->id_temporada=1;
        $jornada->data_jornada='2023-06-24';
        $jornada->save();

        $partit = new Partit();
        $partit->id_jornada=1;
        $partit->id_equip_local=1;
        $partit->id_equip_visitant=3;
        $partit->save();

        $partit = new Partit();
        $partit->id_jornada=1;
        $partit->id_equip_local=4;
        $partit->id_equip_visitant=2;
        $partit->save();

        $jugador = new Jugador();
        $jugador->nom = 'Pepito';
        $jugador->cognom = 'Gomez';
        $jugador->dorsal = 1;
        $jugador->data_naixement = '1999-01-15';
        $jugador->posicio = 'El';
        $jugador->foto = 'user.png';
        $jugador->id_team=2;
        $jugador->save();

        $jugador = new Jugador();
        $jugador->nom = 'Raul';
        $jugador->cognom = 'Sanchez';
        $jugador->dorsal = 3;
        $jugador->data_naixement = '2000-10-17';
        $jugador->posicio = 'DFC';
        $jugador->foto = 'user.png';
        $jugador->id_team=2;
        $jugador->save();

        $jugador = new Jugador();
        $jugador->nom = 'David';
        $jugador->cognom = 'Perez';
        $jugador->dorsal = 3;
        $jugador->data_naixement = '2001-04-29';
        $jugador->posicio = 'DFC';
        $jugador->foto = 'user.png';
        $jugador->id_team=1;
        $jugador->save();
    }
}
