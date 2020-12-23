<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sidi Farid Pedro Raoui Aguirre',
            'username' => 'gambito_corp',
            'email' => 'asesor.pedro@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('C4tntnox*+'),
            'remember_token' => Str::random(10),
        ]);
        Profile::create([
            'user_id' => 1,
            'titulo' => 'Perfil de @gambito_corp',
            'bio' => 'Biografia de Sidi Farid Pedro Raoui Aguirre',
            'web' => 'http://pedroaguirreconsultores.com',
            'facebook' => 'https://www.facebook.com/profile.php?id=100018287836640',
            'linkedin' => 'https://www.linkedin.com/in/pedroraguirre/'
        ]);
        $users = User::factory(100)->create();
        foreach ($users as $user){
            Profile::factory()->create([
                'user_id' => $user->id,
                'titulo' => 'Perfil de @'.$user->username,
                'bio' => 'Biografia de '.$user->name
            ]);
        }
    }
}
