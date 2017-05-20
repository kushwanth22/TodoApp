<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class TodoController extends Controller
{
  // public function index(){
  //   Todo::all();
  //   //$input = Input::all();
  //   $get = new \App\Todo;
  //   $get->body = request('body');
  //   $get->completed = request('completed');
  //   //$get->save();
  // }
  public function store() {
    // if(Session::token() == Input::get('_token')){
    //   $data = Input::all();
    //   print_r($data);die;

      //dd(request()->all());
      $post = new \App\Todo;
      $post->body = request('body');
      $post->completed = request('completed');
      $post->save();
      return redirect('/todos');

      //return 'hello';
    }
  }
