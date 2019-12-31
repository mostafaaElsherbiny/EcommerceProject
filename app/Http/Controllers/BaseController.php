<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller
{
    use FlashMessages;
    protected $date=null;
protected function setPageTitle($title,$subTitle){
    view()->share(['title'=>$title,'subTitle'=>$subTitle]);

}
/**
 * @param int $errorCode
 * @param null $message
 * @return \Illuminate\http\Response\
 */


 protected function showErrorPage($errorCode=404,$message=null){
     $date['message']=$message;
     return response()->view('errors.'.$errorCode,$date,$errorCode);

 }
/**
 * @param bool $error
 * @param int $responseCode
 * @param array $message
 * @param null  $data
 * @return  \Illuminate\Http\JsonResponse
 */


 protected function responseJson($error=true,$responseCode=200,$message=[],$data=null){
     return response()->json([
        'error'     =>  $error,
        'response_code'     =>  $responseCode,
        'message'     =>  $message,
        'data'     =>  $data,
     ]);
 }
 /**
  * @param $route
  * @param $message
  * @param string $type
  * @param bool $error
  * @param bool $withOldInputWhenError
  */
 protected function responseRedirect($route,$message,$type='info',$error=false,$withOldInputWhenError=false){
     $this->setFlashMessage($message,$type);
     $this->showFlashMessages();
     if ($error && $withOldInputWhenError){
         return redirect()->back()->withInput();

     }
     return redirect()->route($route);
 }
 /** */
protected function responseRedirectBack($message,$type='info',$error=false,$withOldInputWhenError=false){
    $this->setFlashMessage($message,$type);
    $this->showFlashMessages();
    return redirect()->back();
}
}
