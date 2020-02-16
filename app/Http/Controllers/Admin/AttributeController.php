<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AttributeRepository;

class AttributeController extends BaseController
{
    protected $attributeRepository;


    public function __construct(AttributeContract $attributeRepository)
    {
            $this->attributeRepository = $attributeRepository;
    }


    public function index(){
        $attributes=$this->attributeRepository->listAttributes();

        $this->setPageTitle('Attributes','List of All Attributes');
        return view('admin.attributes.index',compact('attributes'));
    }
}
