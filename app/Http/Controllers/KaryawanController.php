<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataKaryawan'] = Karyawan::all();
		return view('admin.karyawan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['deskripsi'] = $request->deskripsi;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        Karyawan::create($data);

        return redirect()->route('karyawan.index')->with('success','Penambahan Data Karyawan Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataKaryawan'] = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan_id = $id;
        $karyawan = Karyawan::findOrFail($karyawan_id);

        $karyawan->first_name = $request->first_name;
        $karyawan->last_name = $request->last_name;
        $karyawan->deskripsi = $request->deskripsi;
        $karyawan->birthday = $request->birthday;
        $karyawan->gender = $request->gender;
        $karyawan->email = $request->email;
        $karyawan->phone = $request->phone;

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success','Perubahan Data Karyawan Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success','Data Karyawan Berhasil dihapus!');
    }

    public function lihatCv(string $id)
    {
        $data['dataKaryawan'] = Karyawan::findOrFail($id);
        return view('admin.karyawan.cv', $data);
    }
}
