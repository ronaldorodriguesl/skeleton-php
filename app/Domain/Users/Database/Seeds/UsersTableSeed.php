<?php

namespace App\Domain\Users\Database\Seeds;

use App\Domain\Users\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(5);
    }
}
