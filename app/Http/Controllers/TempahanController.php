<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempahan;

use App\User;
use App\Lab;

class TempahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $senarai_tempahan = Tempahan::paginate(5);

      return view('tempahan/template_index', compact('senarai_tempahan'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Dapatkan senarai user untuk dropdown
        $senarai_users = User::select('nama', 'id')->get();
        # Dapatkan senarai lab untuk dropdown
        $senarai_labs = Lab::select('nama', 'id')->get();

        return view('tempahan/template_add', compact('senarai_users', 'senarai_labs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'user_id' => 'required|integer',
          'lab_id' => 'required|integer',
          'tarikh_mula' => 'required'
        ]);

        $data = $request->all();

        Tempahan::create($data);

        return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya ditambah!');
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
      # Dapatkan senarai user untuk dropdown
      $senarai_users = User::select('nama', 'id')->get();
      # Dapatkan senarai lab untuk dropdown
      $senarai_labs = Lab::select('nama', 'id')->get();

      $tempahan = Tempahan::find($id);

        return view('tempahan/template_edit', compact('senarai_users', 'senarai_labs', 'tempahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'user_id' => 'required|integer',
        'lab_id' => 'required|integer',
        'tarikh_mula' => 'required'
      ]);

      $data = $request->all();

      $tempahan = Tempahan::find($id);
      $tempahan->update($data);

      return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tempahan = Tempahan::find($id);
      $tempahan->delete();

      return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya dihapuskan!');
    }
}
