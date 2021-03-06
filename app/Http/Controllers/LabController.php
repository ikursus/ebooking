<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lab;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senarai_lab = [
        //   ['id' => 1, 'nama' => 'Makmal Komputer 1', 'status' => 'available'],
        //   ['id' => 2, 'nama' => 'Makmal Komputer 2', 'status' => 'not_available'],
        //   ['id' => 3, 'nama' => 'Makmal Komputer 3', 'status' => 'available']
        //
        // ];
        $senarai_lab = Lab::paginate(5);

        return view('labs/template_index', compact('senarai_lab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labs/template_add');
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
          'nama' => 'required',
          'status' => 'in:available,not_available'
        ]);
        # Dapatkan SEMUA daripada borang
        $data = $request->all();
        # Simpan data ke Table labs
        Lab::create($data);
        # redirect ke halaman senarai labs
        return redirect()->route('lab.index')->with('ayat-success', 'Rekod telah berjaya ditambah!');
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
        # Dapatkan data user berdasrakan idea
        # $lab = Lab::where('id', '=', $id)->first();
        $lab = Lab::find($id);

        return view('labs/template_edit', compact('lab'));
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
        'nama' => 'required',
        'status' => 'in:available,not_available'
      ]);
      # Dapatkan SEMUA data
      $data = $request->all();
      # Simpan data ke dalam database berdasarkan ID yang dikemaskini
      $lab = Lab::find($id);
      $lab->update($data);

      # $lab2 = Lab::where('id', '=', $id)->update($data);

      return redirect()->route('lab.index')->with('ayat-success', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      # Dapatkan rekod lab yang ingin dihapuskan merujuk ID lab.
      $lab = Lab::find($id);
      $lab->delete();

      return redirect()
      ->route('lab.index')
      ->with('ayat-success', 'Rekod telah dihapuskan!');
    }
}
