<?php
/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/1/14
 * Time: 1:48 PM
 */
class Category extends Eloquent{
    protected $fillable = array('name', 'image');

    public static $rules = array(
        'name' => 'required|min:3',
        'image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif'
    );

    public function products() {
        return $this->hasMany('Products');
    }
}