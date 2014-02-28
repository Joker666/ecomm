<?php
/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/1/14
 * Time: 1:53 PM
 */
class CategoriesController extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }

    public function getIndex(){
        return View::make('categories.index')
            ->with('categories', Category::all());
    }

    public function postCreate($category_id=0){
        $validator = Validator::make(Input::all(), Category::$rules);

        if($validator->passes()){
            if($category_id!=0){
                $category = Category::find($category_id);
            }else{
                $category = new Category;
            }
            $category->name = Input::get('name');
            $image = Input::file('image');
            $filename = date('Y-m-d-H-i-s-').rand(100,999).'.'. $image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(250, 437)->save('public/img/categories/'.$filename);
            $category->image = 'img/categories/'.$filename;
            $category->save();

            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Created');
        }

        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy(){
        $category = Category::find(Input::get('id'));
        if($category){
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category deleted');
        }
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong, please try again');
    }

    public function getUpdate($category_id){
        $cat = Category::find($category_id);
        return View::make('categories.view')
            ->with('category', $cat);
    }
}