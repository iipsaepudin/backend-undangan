<?php

use Core\Database\Generator;
use App\Models\User;
use Core\Valid\Hash;

return new class implements Generator
{
    /**
     * Generate nilai database
     *
     * @return void
     */
    public function run()
    {
        $user = User::find('days@project.com', 'email');

        if (!$user->exist()) {
            $user = User::create([
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('12345678')
            ]);
        }


        $user->fill([
            'is_filter' => true,
            'access_key' => Hash::rand(25),
        ])->save();
    }
};
