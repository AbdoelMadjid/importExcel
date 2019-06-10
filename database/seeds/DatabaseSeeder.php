<?php

use App\Imports\ExcelMysqlImport;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Sex;
use App\Secretary;
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
        
        Sex::create(['description' => 'Femenino']);
        Sex::create(['description' => 'Masculino']);
        Sex::create(['description' => 'Otro']);

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

        $secretary = [
            1=>[
                'description'=>'Secreatario General'
            ],
            2=>[
                'description'=>'Secreatario General Adjunto'
            ],
            3=>[
                'description'=>'Secretaría de Divulgacion y Actas'
            ],
            4=>[
                'description'=>'Secretaría Género'
            ],
            5=>[
                'description'=>'Secretaría Seguridad Social'
            ],
            6=>[
                'description'=>'Secretaría Deportes, Rec. Cultura'
            ],
            7=>[
                'description'=>'Secretaría Juventud'
            ],
            8=>[
                'description'=>'Secretaria Finanzas y Adm.'
            ],
            9=>[
                'description'=>'Secretaría de Educación'
            ],
            10=>[
                'description'=>'Secretarías de Conflictos'
            ],
        ];

        Secretary::insert($secretary);
		
	
        Excel::import(new ExcelMysqlImport, 'demo.csv','local');
    }
}
