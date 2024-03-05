<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'fname' => 'Bramwel',
            'lname' => 'Tum',
            'username'=> 'btum',
            'email' => 'bram@admin.com',
            'password' => bcrypt('password'),
            'role' => 2 // Assuming you want to create an admin user
        ]);
        
        $role = Role::create(['username' => 'Admin']);
         
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}