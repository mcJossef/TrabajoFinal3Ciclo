<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@tecsup.edu.pe';
        $user->telefono = '940294323'; // Cambia esto según tus necesidade
        $user->id_role = 2;
        $user->email_verified_at = now();
        $user->password = Hash::make('contraseña');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes=  null;
        $user->remember_token=  Str::random(10);
        $user->profile_photo_path = null;
        $user->current_team_id =  null;
        $user ->save();

        /*$user = new User();
        $user->name = 'Gabriel';
        $user->email = 'gabriel@tecsup.edu.pe';
        $user->telefono = '940294323'; // Cambia esto según tus necesidade
        $user->email_verified_at = now();
        $user->password = Hash::make('contraseña');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes=  null;
        $user->remember_token=  Str::random(10);
        $user->profile_photo_path = null;
        $user->current_team_id =  null;
        $user ->save();

        $user = new User();
        $user->name = 'Jennifer';
        $user->email = 'jennifer@tecsup.edu.pe';
        $user->telefono = '940543323'; // Cambia esto según tus necesidade
        $user->email_verified_at = now();
        $user->password = Hash::make('contraseña');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes=  null;
        $user->remember_token=  Str::random(10);
        $user->profile_photo_path = null;
        $user->current_team_id =  null;
        $user ->save();

        $user = new User();
        $user->name = 'Roberto';
        $user->email = 'roberto@tecsup.edu.pe';
        $user->telefono = '940324323'; // Cambia esto según tus necesidade
        $user->email_verified_at = now();
        $user->password = Hash::make('contraseña');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes=  null;
        $user->remember_token=  Str::random(10);
        $user->profile_photo_path = null;
        $user->current_team_id =  null;
        $user ->save();

        $user = new User();
        $user->name = 'Anthony';
        $user->email = 'anthony@tecsup.edu.pe';
        $user->telefono = '940114323'; // Cambia esto según tus necesidade
        $user->email_verified_at = now();
        $user->password = Hash::make('contraseña');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes=  null;
        $user->remember_token=  Str::random(10);
        $user->profile_photo_path = null;
        $user->current_team_id =  null;
        $user ->save(); 
        */
    }
}
