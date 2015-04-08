<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        User::insert(array(
                            array(
                                'role_id'=>1, 
                                'manager_id' =>0,
                                'name' =>'admin',
                                'kana' =>'kana',
                                'email' =>'admin@gmail.com',
                                'birthday' =>'1984-06-19',
                                'password'=>Hash::make('123456789'),
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                            array(
                                'role_id'=>2, 
                                'manager_id' =>1,
                                'name' =>'boss',
                                'kana' =>'kana',
                                'email' =>'boss@gmail.com',
                                'birthday' =>'1984-06-19',
                                'password'=>Hash::make('123456789'),
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                            array(
                                'role_id'=>3, 
                                'manager_id' =>2,
                                'name' =>'employee1',
                                'kana' =>'kana',
                                'email' =>'employee1@gmail.com',
                                'birthday' =>'1984-06-19',
                                'password'=>Hash::make('123456789'),
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                            array(
                                'role_id'=>3, 
                                'manager_id' =>2,
                                'name' =>'employee2',
                                'kana' =>'kana',
                                'email' =>'employee2@gmail.com',
                                'birthday' =>'1984-06-19 16:25:21',
                                'password'=>Hash::make('123456'),
                                'created_at' => $now, 
                                'updated_at' => $now
                                )
        
        ));

    }

}