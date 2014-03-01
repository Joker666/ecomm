<?php
/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/2/14
 * Time: 1:19 PM
 */

class UsersTableSeeder extends Seeder{
    public function run(){
        User::truncate();

        $user = new User();
        $user->firstname = 'Jon';
        $user->lastname = 'Doe';
        $user->email = 'jon@doe.com';
        $user->password = Hash::make('mypassword');
        $user->admin = 1;
        $user->save();
    }
}