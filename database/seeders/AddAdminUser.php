<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
class AddAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            // [
            //     'name'=>'Bui The Dung',
            //     'username'=>'buidung-superad',
            //     'email'=>'thedung.1292@gmail.com',
            //     'password'=>Hash::make('Buidung1292'),
            //     'password_raw'=>'Buidung1292',
            //     'role_user'=>ROLE_SUPER_ADMIN,
            //     'active'=>USER_ACTIVATED,
            // ],
            // [
            //     'name'=>'Bui The Dung',
            //     'username'=>'buidung-ad',
            //     'email'=>'thedung.1292@gmail.com',
            //     'password'=>Hash::make('Buidung1292'),
            //     'password_raw'=>'Buidung1292',
            //     'role_user'=>ROLE_ADMIN,
            //     'active'=>USER_ACTIVATED,
            // ],
            // [
            //     'name'=>'Bui The Dung',
            //     'username'=>'buidung-user',
            //     'email'=>'thedung.1292@gmail.com',
            //     'password'=>Hash::make('Buidung1292'),
            //     'password_raw'=>'Buidung1292',
            //     'role_user'=>ROLE_USER,
            //     'active'=>USER_ACTIVATED,
            // ],

            [
                'name'=>'Trong Nguyen',
                'username'=>'trongnguyen',
                'email'=>'nvt.702@gmail.com',
                'password'=>Hash::make('Trong2250f702'),
                'password_raw'=>'Trong2250f702',
                'role_user'=>ROLE_SUPER_ADMIN,
                'active'=>USER_ACTIVATED,
            ],
        ];

        DB::beginTransaction();
        try{
            foreach($users as $user){
                User::updateOrCreate([
                    'name' => $user['name'],
                    'username'=>$user['username'],
                    'password'=>$user['password'],
                    'role_user'=>$user['role_user'],
                    'active' =>$user['active'],
                    'email' =>$user['email'],
                    'password_raw'=>$user['password_raw'],
                ]);
            }
            DB::commit();
        } catch(\Exception $e){
            Log::debug('Add user seeder : '.$e);
            DB::rollback();

        }
    }

}
