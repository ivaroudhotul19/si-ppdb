<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardMajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.majors.index',[
            'majors' => Major::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_jurusan' => 'required|max:8|unique:majors',
            'jurusan' => 'required|max:255',
            'daya_tampung' => 'required|integer',
            'thn_ajaran' => 'required|max:10'
        ]);
        // buat masukin ke database
        Major::create($validatedData);
        Alert::success('Success adding a major', 'Major has been successfully created');
        return redirect('/dashboard/majors');
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
    public function edit(Major $major)
    {
        return view('dashboard.pages.majors.edit',[
            'major' => $major,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
         $rules = [
            'jurusan' => 'required',
            'daya_tampung' => 'required|integer',
            'thn_ajaran' => 'required|max:10'
        ];
        // karena unique maka tidak boleh sama dengan data yang ada di database, jadi dibuat pengkondisian
        if($request->kd_jurusan != $major->kd_jurusan) {
            $rules['kd_jurusan'] = 'required|max:8|unique:majors';
        }

        $validatedData = $request->validate($rules);

        // buat masukin ke database
        Major::where('id', $major->id)
            ->update($validatedData);
        Alert::success('Success editing a major', 'Major has been successfully edited');
        return redirect('/dashboard/majors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        Major::destroy($major->id);
        Alert::success('Success deleted a major', 'Major has been successfully deleted');
        return redirect('/dashboard/majors');
    }

    public function print()
    {
        $majors = Major::get();
        $pdf = Pdf::loadview('dashboard.pages.majors.print', 
            ['majors'=>$majors])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-jurusan.pdf');
    }
}
