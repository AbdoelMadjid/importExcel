<?php

use App\Imports\ExcelMysqlImport;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $role = Role::create(['name' => 'Administrator']);
        
        $role = Role::create(['name' => 'User']);

        $permission = Permission::create(['name' => 'edit']);
        $permission = Permission::create(['name' => 'create']);
        $permission = Permission::create(['name' => 'delete']);
        $permission = Permission::create(['name' => 'read']);


        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
        ]);
        
        $admin->assignRole('Administrator');
        
        $user->assignRole('User');

        $admin->givePermissionTo('read' ,'edit', 'delete','create','delete');
        
        $user->givePermissionTo('read' ,'edit', 'delete','create','delete');
		
	
        Excel::import(new ExcelMysqlImport, 'demo.csv','local');
    }
}
