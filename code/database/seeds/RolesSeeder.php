<?php

use Government\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count((new Role())->where('name', Role::ROLE_COMPANY_MEMBER)->get())) {
            (new Role(['name' => Role::ROLE_COMPANY_MEMBER]))->save();
        }
    }
}
