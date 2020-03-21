<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;


class AttributeController extends BaseController
{
    protected $attributeRepository;


    public function __construct(AttributeContract $attributeRepository)
    {
            $this->attributeRepository = $attributeRepository;
    }

       /**
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */

    public function index(){
        $attributes=$this->attributeRepository->listAttributes();

        $this->setPageTitle('Attributes','List of All Attributes');
        return view('admin.attributes.index',compact('attributes'));
    }


       /**
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */

    public function create(){
        $this->setPageTitle('Attribute','create attribute');
        return view('admin.attributes.create');
    }


    public function store(Request $request){
        $this->validate($request,[
            'code'=>'required',
            'name'=>'required',
            'frontend_type'=>'required',
        ]);
        $params=$request->except('_token');
        $attribute=$this->attributeRepository->createAttribute($params);
        if(!$attribute){
                return $this->responseRedirectBack('error occured while creating a new attribute','error',true,true);
        }

        return $this->responseRedirect('admin.attributes.index','successfully we added a new attribute','success',false,false);

    }

    public function edit($id){

        $attribute=$this->attributeRepository->findAttributeById($id);
        $this->setPageTitle('Edit','Edit attribute : '.$attribute->name);

        return view('admin.attributes.edit',compact('attribute'));

    }


    public function update(Request $request){
        $this->validate($request,[
            'code'=>'required',
            'name'=>'required',
            'frontend_type'=>'required'
        ]);
        $params=$request->except('_token');
        $attribute=$this->attributeRepository->updateAttribute($params);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute updated successfully' ,'success',false, false);
    }

    public function delete($id){
        $attribute=$this->attributeRepository->deleteAttribute($id);
        if(!$attribute){
            return $this->responseRedirectBack('Error Occured while deleting this attribute');
        }
        return $this->responseRedirect('admin.attributes.index','we successfully deleted your old attribute','success' ,false,false);
    }
}
