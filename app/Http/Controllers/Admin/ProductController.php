<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\storeProductFormValidation;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $brandRepository;
    protected $categoryRepository;
    protected $productRepository;



public function __construct(BrandContract $brandRepository,CategoryContract $categoryRepository,ProductContract $productRepository)
{
    $this->brandRepository=$brandRepository;
    $this->categoryRepository=$categoryRepository;
    $this->productRepository=$productRepository;
}

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=$this->brandRepository->listBrands('name','asc');
        $categories=$this->categoryRepository->listCategories('name','asc');
        $this->setPageTitle('Products','create product');
        return view('admin.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductFormValidation $request)
    {
        $params=$request->except('_token');
        $product=$this->productRepository->createProduct($params);
        if(!$product){
            return $this->responseRedirectBack('error occured while creaing product','error',true,true);
        }
        return $this->responseRedirect('admin.products.index','one product added successfuly','success',false,false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeProductFormValidation $request)
{
    $params = $request->except('_token');

    $product = $this->productRepository->updateProduct($params);

    if (!$product) {
        return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
    }
    return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){

        $product=$this->productRepository->deleteProduct($id);

        if(!$product){
          return $this->responseRedirectBack('Error Occurred while deleting this category.','error',true,true);
        }else{
        return $this->responseRedirect('admin.products.index','product delete successfully','success',false,false);
        }
       }
}
