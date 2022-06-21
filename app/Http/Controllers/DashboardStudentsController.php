<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Models\Major;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class DashboardStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk menampilkan field jurusan dengan relasi function major(major_id)
        $students = NewStudent::all();
        return view('dashboard.pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.students.create',[
            'students' => NewStudent::all(),
            'majors' => Major::all()
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
        // return $request;
        $validatedData = $request->validate([
            'major_id' => 'required',
            'no_pendf' => 'required|max:8|unique:new_students',
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'almt' => 'required|max:255',
            'asal_sklh' => 'required|max:255',
            'jns_kelamin' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|integer',
            'agama' => 'required|max:255',
            'nama_ortu' => 'required|max:255',
            'pkerjaan_ortu' => 'required|max:255',
            'nilai_un' => 'required',
            'nilai_usek' => 'required',
            'prestasi' => 'max:255|nullable'
        ] );

        $validatedData['image'] = $request->file('image')->store('student-images', 'public');

        // dd($validatedData);
        // buat masukin ke database
        NewStudent::create($validatedData);
        Alert::success('Success adding a student', 'Student has been successfully created');
        return redirect('/dashboard/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NewStudent $student)
    {
        return view('dashboard.pages.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewStudent $student)
    {
        return view('dashboard.pages.students.edit',[
            'title' => 'Edit Dashboard',
            'majors' => Major::all()
        ],compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewStudent $student)
    {
        $rules = [
            'major_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'almt' => 'required|max:255',
            'asal_sklh' => 'required|max:255',
            'jns_kelamin' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|integer',
            'agama' => 'required|max:255',
            'nama_ortu' => 'required|max:255',
            'pkerjaan_ortu' => 'required|max:255',
            'nilai_un' => 'required',
            'nilai_usek' => 'required',
            'prestasi' => 'max:255|nullable'
        ];

        if($request->no_pendf != $student->no_pendf){
            $this->validate($request, [
                $rules['no_pendf'] = 'required|max:8|unique:new_students',
            ]);
        }
        $validatedData = $request->validate($rules);
        if($request->hasFile('image')){
            $validatedData['image'] = $request->file('image')->store('student-images', 'public');
            
            if($student->image) {
                Storage::disk('public')->delete($student->image);
            }
        } 

        // dd($validatedData);
        // buat masukin ke database
        NewStudent::where('id', $student->id)
            ->update($validatedData);
        Alert::success('Success updating a student', 'Student has been successfully updated');
        return redirect('/dashboard/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewStudent $student)
    {
        NewStudent::destroy($student->id);
        Alert::success('Success deleted a Student', 'Student has been successfully deleted');
        return redirect('/dashboard/students');
    }

    public function print()
    {
        $students = NewStudent::get();
        $pdf = Pdf::loadview('dashboard.pages.students.print', 
            ['students'=>$students])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-siswa.pdf');
    }

    public function print_detail(NewStudent $student) {
        $pdf = Pdf::loadview('dashboard.pages.students.print-detail', 
           ['student'=>$student])->setOptions(['isRemoteEnable' => true]
        );
        
        return $pdf->stream();
        // return view('dashboard.pages.students.print-detail', [
        //     'student' => $student
        // ]);
    }
}
