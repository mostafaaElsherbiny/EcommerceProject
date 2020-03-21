<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

use Illuminate\Http\RedirectResponse;


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
        $categories = $this->categoryRepository->treeList();

           $this->setPageTitle('Categories','Create Category');
           return view('admin.categories.create',compact('categories'));
       }



       /**
        * @param Request $request
        * @return \Illuminate\Http\RedirectResponse;
        * @throws \Illuminate\Validation\ValidationException;

        */


       public function store(Request $request){
      $this->validate($request,[
        'name'=>'required|max:191',
        'parent_id'=>'required|not_in:0',
        'image'=>'image|max:1024',
      ]);
      $params=$request->except('_token');
      $category=$this->categoryRepository->createCategory($params);
        if(!$category){
            return $this->responseRedirectBack('Error occurred while creating.','error',true,true);
        }
        return $this->responseRedirect('admin.categories.index','Category Added succssfully','success',false,false);
       }



        /**
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */


       public function edit($id){
          $targetCategory= $this->categoryRepository->findCategoryById($id);
          $categories = $this->categoryRepository->treeList();

          $this->setPageTitle('Categories','Edit Category : '.$targetCategory->name);

          return view('admin.categories.edit',compact('categories','targetCategory'));

       }




       /**
        * @param   Request $request
        *@return \Illuminate\Http\RedirectResponse;
        *@throws \Illuminate\Validation\ValidationException;
        */
       public function update(Request $request){
            $this->validate($request,[
                'name'         =>'required|max:191',
                'parent_id'    =>'required|not_in:0',
                'image'        =>'mimes:jpg,jpeg,png|max:1000'
            ]);

            $params=$request->except('_token');
            $category=$this->categoryRepository->updateCategory($params);

            if(!$category){
                return $this->responseRedirectBack('Error Occured While Updating Category.','error','true','true');
            }
            return $this->responseRedirectBack('Category Update successfuly.','success',false,false);
       }





            /**
            * @param $id
            * @return \Illuminate\Http\RedirectResponse
            */
       public function delete($id){

        $category=$this->categoryRepository->deleteCategory($id);

        if(!$category){
          return $this->responseRedirectBack('Error Occurred while deleting this category.','error',true,true);
        }else{
        return $this->responseRedirect('admin.categories.index','category delete successfully','success',false,false);
        }
       }


}


