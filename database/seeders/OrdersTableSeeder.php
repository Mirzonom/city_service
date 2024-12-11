<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('group', 1)->get();

        $orderTemplates = [
            [
                'subject' => 'Ремонт дороги',
                'message' => 'На улице Ленина, возле дома 25, образовалась большая яма. Просьба отремонтировать дорожное покрытие.',
            ],
            [
                'subject' => 'Освещение во дворе',
                'message' => 'Не работает уличное освещение во дворе по адресу ул. Пушкина, д. 15. Просьба восстановить освещение.',
            ],
            [
                'subject' => 'Уборка территории',
                'message' => 'Просьба организовать уборку территории парка "Центральный". Скопился мусор после выходных.',
            ],
            [
                'subject' => 'Бродячие собаки',
                'message' => 'В районе школы №5 замечена стая бродячих собак. Просьба принять меры.',
            ],
            [
                'subject' => 'Ремонт детской площадки',
                'message' => 'На детской площадке по адресу ул. Гагарина, д. 10 сломаны качели. Требуется ремонт.',
            ],
        ];

        foreach ($users as $user) {
            $numberOfOrders = rand(1, 3);

            for ($i = 0; $i < $numberOfOrders; $i++) {
                $template = $orderTemplates[array_rand($orderTemplates)];

                Order::create([
                    'subject' => $template['subject'],
                    'message' => $template['message'],
                    'user_id' => $user->id,
                    'created_at' => now()->subDays(rand(1, 30)), // Случайная дата за последние 30 дней
                ]);
            }
        }
    }
}
