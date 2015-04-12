<?php
class CommentTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Comment::insert(array(
                            array(
                                'user_id'=>3, 
                                'content'=>'pro', 
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                            array(
                                'user_id'=>4, 
                                'content'=>'new bie', 
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                            array(
                                'user_id'=>5, 
                                'content'=>'comment user5', 
                                'created_at' => $now, 
                                'updated_at' => $now
                                ),
                        ));

    }

}