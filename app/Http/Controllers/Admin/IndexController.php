<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
      // print_r($request->session()->all());
      // print_r($request->getRequestUri());
      return view('admin.index.index');
    }
}
