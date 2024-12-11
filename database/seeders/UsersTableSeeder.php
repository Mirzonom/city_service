<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Администратор',
            'login' => 'admin',
            'email' => 'admin@example.com',
            'call' => '+7 (999) 999-99-99',
            'password' => Hash::make('admin123'),
            'group' => 2, // группа администратора
        ]);

        // Создаем обычных пользователей
        $users = [
            [
                'name' => 'Иван Петров',
                'login' => 'ivan',
                'email' => 'ivan@example.com',
                'call' => '+7 (999) 888-77-66',
                'password' => Hash::make('password123'),
                'group' => 1,
            ],
            [
                'name' => 'Мария Сидорова',
                'login' => 'maria',
                'email' => 'maria@example.com',
                'call' => '+7 (999) 777-66-55',
                'password' => Hash::make('password123'),
                'group' => 1,
            ],
            [
                'name' => 'Алексей Иванов',
                'login' => 'alex',
                'email' => 'alex@example.com',
                'call' => '+7 (999) 666-55-44',
                'password' => Hash::make('password123'),
                'group' => 1,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
