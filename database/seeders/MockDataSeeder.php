<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class MockDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        // 1. Criar Endereços
        $addressIds = [];
        for ($i = 0; $i < 3; $i++) {
            $addressIds[] = DB::table('addresses')->insertGetId([
                'street' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'city' => $faker->city,
                'state' => 'BA',
                'cep' => $faker->postcode,
                'created_at' => now(),
            ]);
        }

        // 2. Criar Instituições
        $instIds = [];
        for ($i = 0; $i < 2; $i++) {
            $instIds[] = DB::table('institutions')->insertGetId([
                'name' => 'Universidade ' . $faker->company,
                'cnpj' => $faker->unique()->numerify('##.###.###/0001-##'),
                'created_at' => now(),
            ]);
        }

        // 3. Criar Campuses
        $campusIds = [];
        foreach ($instIds as $index => $instId) {
            $campusIds[] = DB::table('campuses')->insertGetId([
                'name' => 'Campus ' . $faker->city,
                'institution_id' => $instId,
                'address_id' => $addressIds[$index],
                'created_at' => now(),
            ]);
        }

        // 4. Criar Comunidades
        $communityIds = [];
        foreach ($campusIds as $campusId) {
            for ($i = 0; $i < 2; $i++) {
                $communityIds[] = DB::table('communities')->insertGetId([
                    'name' => 'Comunidade de ' . $faker->jobTitle,
                    'description' => $faker->sentence,
                    'campus_id' => $campusId,
                    'created_at' => now(),
                ]);
            }
        }

        // 5. Criar Usuários
        $userIds = [];
        for ($i = 0; $i < 10; $i++) {
            $userIds[] = DB::table('users')->insertGetId([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('senha123'), // Senha padrão para todos
                'campus_id' => $faker->randomElement($campusIds),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        // 6. Criar Posts
        $postIds = [];
        for ($i = 0; $i < 15; $i++) {
            $postIds[] = DB::table('posts')->insertGetId([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true),
                'user_id' => $faker->randomElement($userIds),
                'community_id' => $faker->randomElement($communityIds),
                'created_at' => now(),
            ]);
        }

        // 7. Criar Comentários
        for ($i = 0; $i < 30; $i++) {
            DB::table('comments')->insert([
                'content' => $faker->paragraph,
                'post_id' => $faker->randomElement($postIds),
                'user_id' => $faker->randomElement($userIds),
                'parent_id' => null,
                'created_at' => now(),
            ]);
        }
    }
}
