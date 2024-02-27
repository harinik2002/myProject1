<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ConstantController extends Controller
{
    public function index(){
        ($roles = config('constant.roles'));
         print_r($roles);
    }
}
