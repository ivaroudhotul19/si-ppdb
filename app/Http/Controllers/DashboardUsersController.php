<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.users.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.users.create');
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
            'name' => 'required|max:255',
            'nip' => 'required|max:20|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // enkripsi password (hashing password)
        $validatedData['password'] = Hash::make($validatedData['password']);

        // buat masukin ke database
        User::create($validatedData);
        Alert::success('Success adding a user', 'User has been successfully created');
        return redirect('/dashboard/users');
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
    public function edit(User $user)
    {
        return view('dashboard.pages.users.edit',[
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
   $rules = [
            'name' => 'required|max:255',
        ];
        
        // karena unique maka tidak boleh sama dengan data yang ada di database, jadi dibuat pengkondisian
        if($request->nip != $user->nip) {
            $rules['nip'] = 'required|max:20|unique:users';
        }
        if($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        if($request->password != '') {
            $rules['password'] = 'min:5|max:255';
        }
        
        $validatedData = $request->validate($rules);
        if($request->password) {
            
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // kalau password tidak di edit maka tetep bisa di save
        $validatedData['password'] = $user->password;

        // buat masukin ke database
        User::where('id', $user->id)
            ->update($validatedData);
        Alert::success('Success editing a user', 'User has been successfully edited');
        return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        Alert::success('Success deleted a user', 'User has been successfully deleted');
        return redirect('/dashboard/users');
    }

    public function print()
    {
        $users = User::get();
        $pdf = Pdf::loadview('dashboard.pages.users.print', 
            ['users'=>$users])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-user.pdf');
    }
}
