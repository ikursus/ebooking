<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UsersController extends Controller
{

  public function index()
  {

    $page_title = '<h1>Senarai Users</h1>';

    // $senarai_users = [
    //
    //   ['id' => 1, 'nama' => 'Ali Bin Baba', 'email' => 'alibaba@gmail.com', 'phone' => '0123456789'],
    //   ['id' => 2, 'nama' => 'Abdul Wahab', 'email' => 'abdul@gmail.com', 'phone' => '0123656789'],
    //   ['id' => 3, 'nama' => 'Sidiq Sigaraga', 'email' => 'sidiq@gmail.com', 'phone' => '016576789'],
    //   ['id' => 4, 'nama' => 'Chong Wei', 'email' => 'chongwei@gmail.com', 'phone' => '019866789'],
    //   ['id' => 5, 'nama' => 'Siti', 'email' => 'siti@gmail.com', 'phone' => '0123456559']
    //
    // ];
    # Hubungi table users, dan dapatkan semua data
    $senarai_users = DB::table('users')->get();

    # return view('users/template_index', ['page_title' => $page_title]);
    # return view('users/template_index')->with('page_title', $page_title);
    return view('users/template_index', compact('page_title', 'senarai_users'));

  }

  public function create()
  {
    return view('users/template_add');
  }

  public function store(Request $request)
  {
    // $this->validate($request, [
    //     'nama' => 'required|min:3',
    //     'email' => 'required|email'
    // ]);

    $request->validate([
        'nama' => 'required|min:3|string',
        'email' => 'required|email',
        'telefon' => 'required'
    ]);

    $data = $request->all();

    return $data;
  }

  public function edit($id)
  {
    return view('users/template_edit');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'nama' => 'required|min:3|string',
        'email' => 'required|email',
        'telefon' => 'required'
    ]);

    $data = $request->all();

    return $data;
  }

  public function destroy($id)
  {
    return 'Rekod telah berjaya dihapuskan';
  }
}
