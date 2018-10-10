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
    $senarai_users = DB::table('users')
    ->orderBy('id', 'desc')
    # ->where('id', '=', 2)
    # ->select('id', 'nama', 'email', 'phone')
    # ->get();
    ->paginate(2);

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
        'password' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required'
    ]);

    # Dapatkan ruangan data dari borang
    $data = $request->only('email', 'phone', 'role');
    # Besarkan semua huruf nama
    $data['nama'] = strtoupper( $request->input('nama') );
    # Dapatkan data password dan encrypt
    $data['password'] = bcrypt( $request->input('password') );
    # Simpan data ke dalam table users
    DB::table('users')->insert($data);
    # Setelah selesai simpan data, redirect ke senarai users.
    return redirect()->route('users.index');
  }

  public function edit($id)
  {
    # Panggil data user dari table users berdasarkan ID yang dipilih
    $user = DB::table('users')->where('id', '=', $id)->first();
    # Paparkan template edit user beserta datanya
    return view('users/template_edit', compact('user') );
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'nama' => 'required|min:3|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required'
    ]);

    # Dapatkan ruangan data dari borang
    $data = $request->only('nama', 'email', 'phone', 'role');

    # Dapatkan data password JIKA tidak kosong dan encrypt
    if ( !empty( $request->input('password') ) )
    {
      $data['password'] = bcrypt( $request->input('password') );
    }

    # Simpan data ke dalam table users
    DB::table('users')->where('id', '=', $id)->update($data);
    # Setelah selesai simpan data, redirect ke halaman sebelum.
    return redirect()->back();
  }

  public function destroy($id)
  {
    return 'Rekod telah berjaya dihapuskan';
  }
}
