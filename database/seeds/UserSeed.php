<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$aImLxV2bzI/P7rzedRcks.1tsD.nEm0e5.Q0/8CuZWGGta9erKu9e', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'customerone', 'email' => 'customerone@kdfootwear.com', 'password' => '$2y$10$zXs3HnqPVXKvGPDOXIFYL.TXjyiO8NyK9eF2ofziZUUGNip1mDlB2', 'role_id' => 2, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
