<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Models\Registration;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.registration.index', [
            'registrations' => Registration::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.registration.create', [
            'users' => User::all(),
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
            'user_id' => 'required',
            'student_id' => 'required',
            'no_registrasi' => 'required|max:8|unique:registrations',
            'tgl_registrasi' => 'required|date',
            'status' => 'required'
        ]);

        Registration::create($validatedData);
        Alert::success('Success adding a registrations', 'Registration has been successfully created');
        return redirect('/dashboard/registrations');        
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
    public function edit(Registration $registration)
    {
        return view('dashboard.pages.registration.edit', [
            'registrations' => Registration::all(),
            'users' => User::all(),
            'students' => NewStudent::all(),
        ], compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $rules = [
            'user_id' => 'required',
            'student_id' => 'required',
            'tgl_registrasi' => 'required|date',
            'status' => 'required'
        ];

        if ($request->no_registrasi != $registration->no_registrasi) {
            $rules['no_registrasi'] = 'required|max:8|unique:registrations';
        }

        $validatedData = $request->validate($rules);
        Registration::where('id', $registration->id)->update($validatedData);
        Alert::success('Success editing a registrations', 'Registration has been successfully edited');
        return redirect('/dashboard/registrations');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        Registration::destroy($registration->id);
        Alert::success('Success deleting a registrations', 'Registration has been successfully deleted');
        return redirect('/dashboard/registrations'); 
    }

    public function print() {
        $registration = Registration::get();
        $pdf = Pdf::loadview('dashboard.pages.registration.print', 
            ['registrations'=>$registration])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('laporan_data_registrasi.pdf');
    }
}
