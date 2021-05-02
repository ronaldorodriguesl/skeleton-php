<?php

namespace Database\Seeders;

use App\Domain\Users\Database\Seeds\UsersTableSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeed::class);
    }
}
