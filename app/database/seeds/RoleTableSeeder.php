<?php
class RoleTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Role::insert(array(
                            array('id'=>'1','name'=>'Admin', 'created_at' => $now, 'updated_at' => $now),
                            array('id'=>'2','name'=>'Boss', 'created_at' => $now, 'updated_at' => $now),
                            array('id'=>'3','name'=>'Employee', 'created_at' => $now, 'updated_at' => $now),
                        ));

    }

}