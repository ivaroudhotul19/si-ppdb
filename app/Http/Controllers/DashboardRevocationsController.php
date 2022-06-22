<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Models\Revocation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardRevocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.revocation.index',[
            'revocations' => Revocation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.revocation.create',[
            'revocations' => Revocation::all(),
            'students' => NewStudent::all()
        ]);
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
            'student_id' => 'required',
            'tgl_cabut' => 'required',
        ]);

        // buat masukin ke database
        Revocation::create($validatedData);
        Alert::success('Success adding a revocation', 'Revocation has been successfully created');
        return redirect('/dashboard/revocations');
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
    public function edit(Revocation $revocation)
    {
        return view('dashboard.pages.revocation.edit',[
            'revocation' => $revocation,
            'students' => NewStudent::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revocation $revocation)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'tgl_cabut' => 'required',
        ]);

        // buat masukin ke database
        Revocation::where('id', $revocation->id)->update($validatedData);
        Alert::success('Success editing a revocation', 'Revocation has been successfully edited');
        return redirect('/dashboard/revocations');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revocation $revocation)
    {
        Revocation::destroy($revocation->id);
        Alert::success('Success deleting a revocation', 'Revocations has been successfully deleted');
        return redirect('/dashboard/revocations'); 
    }

    public function print()
    {
        $revocations = Revocation::get();
        $pdf = Pdf::loadview('dashboard.pages.revocation.print', 
            ['revocations'=>$revocations])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-pencabutan.pdf');
    }
}
