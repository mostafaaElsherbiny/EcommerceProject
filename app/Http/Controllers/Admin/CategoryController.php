<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;



class CategoryController extends BaseController
{
    /**
     *@var CategoryContract
     */

     protected $categoryRepository;

     /**
      * CategoryController constructor .
      * @param CategoryContract $categoryRepository
      */

      public function __construct(CategoryContract $categoryRepository)
      {
        $this->categoryRepository=$categoryRepository;
      }


       /**
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */

       public function index(){
           $categories=$this->categoryRepository->listCategories();
           $this->setPageTitle('Categories','List Of All Categories');
           return
         view('admin.categories.index',compact('categories'));
       }

         /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
       public function create(){
           $categories=$this->categoryRepository->listCategories('id','asc');

           $this->setPageTitle('Categories','Create Category');
           return view('admin.categories.create',compact('categories'));
       }
       public function store(Request $request){
      $this->validate($request,[
        'name'=>'required|max:191',
        'parent_id'=>'required|not_in:0',
        'image'=>'mimes:jpg,jpeg,png|max:1000',
      ]);
      $params=$request->except('_token');
      $category=$this->categoryRepository->createCategory($params);
        if(!$category){
            return $this->responseRedirectBack('Error occurred while creating.','error',true,true);
        }
        return $this->responseRedirect('admin.categories.index','Category Added succssfully','success',false,false);
       }
}


