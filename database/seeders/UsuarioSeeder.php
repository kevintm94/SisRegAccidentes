<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('nombre', 'admin')->first();
        $superRole = Role::where('nombre', 'supervisor')->first();
        $analistaRole = Role::where('nombre', 'analista')->first();
        $trabajadorRole = Role::where('nombre', 'trabajador')->first();

        $usuarios = [
            // Administradores
            [
                'role_id' => $adminRole->id,
                'nombre' => 'María González',
                'email' => 'maria.gonzalez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'estado' => 'activo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => $superRole->id,
                'nombre' => 'Carlos Rodríguez',
                'email' => 'carlos.rodriguez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin2024'),
                'estado' => 'activo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Editores
            [
                'role_id' => $superRole->id,
                'nombre' => 'Ana Martínez',
                'email' => 'ana.martinez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('editor123'),
                'estado' => 'activo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => $analistaRole->id,
                'nombre' => 'Pedro López',
                'email' => 'pedro.lopez@example.com',
                'email_verified_at' => Carbon::now()->subDays(10),
                'password' => Hash::make('pedro2024'),
                'estado' => 'activo',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(5)
            ],

            // Usuarios regulares
            [
                'role_id' => $analistaRole->id,
                'nombre' => 'Laura Sánchez',
                'email' => 'laura.sanchez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('laura123'),
                'estado' => 'activo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => $trabajadorRole->id,
                'nombre' => 'Javier Díaz',
                'email' => 'javier.diaz@example.com',
                'email_verified_at' => Carbon::now()->subDays(15),
                'password' => Hash::make('javier2024'),
                'estado' => 'activo',
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(2)
            ],
            [
                'role_id' => $trabajadorRole->id,
                'nombre' => 'Sofía Herrera',
                'email' => 'sofia.herrera@example.com',
                'email_verified_at' => null, // Email no verificado
                'password' => Hash::make('sofia123'),
                'estado' => 'activo',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(1)
            ],

            // Invitados
            [
                'role_id' => $trabajadorRole->id,
                'nombre' => 'Miguel Torres',
                'email' => 'miguel.torres@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('miguel123'),
                'estado' => 'activo',
                'created_at' => Carbon::now()->subDays(20),
                'updated_at' => Carbon::now()->subDays(10)
            ]
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }
    }
}
