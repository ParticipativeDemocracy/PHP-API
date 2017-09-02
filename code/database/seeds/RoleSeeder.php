<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Role();
      $role->name = 'company_member';
      $role->display_name = 'Company Member';
      $role->description = 'Role indicating user is a member of a company';
      $role->save();

      $user = new User();
      $user->name = 'Jake';
      $user->email = 'test@test.com';
      $user->passport = bcrypt('password');
      $user->save();

      $user->attachRole($role);
    }
}
