<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function homepage() {
      return view('welcome');
  }

  public function hubungi() {

    return view('pages/template_hubungi');

  }
}
