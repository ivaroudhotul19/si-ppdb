<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.payment.index',[
            'payments' => Payment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.payment.create',[
            'payments' => Payment::all(),
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
            'kd_bayar' => 'required|max:8|unique:payments',
            'tagihan' => 'required|integer',
            'status' => 'required'
        ]);
      
        // buat masukin ke database
        Payment::create($validatedData);
        Alert::success('Success adding a payment', 'Payment has been successfully created');
        return redirect('/dashboard/payments');
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
    public function edit(Payment $payment)
    {
        return view('dashboard.pages.payment.edit',[
            'students' => NewStudent::all()
        ],compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $rules = [
            'student_id' => 'required',
            'tagihan' => 'required|integer',
            'status' => 'required'
        ];
        // karena unique maka tidak boleh sama dengan data yang ada di database, jadi dibuat pengkondisian
        if($request->kd_bayar != $payment->kd_bayar) {
            $rules['kd_bayar'] = 'required|max:8|unique:payments';
        }

        $validatedData = $request->validate($rules);

        // buat masukin ke database
        Payment::where('id', $payment->id)
            ->update($validatedData);
        Alert::success('Success editing a payment', 'Payment has been successfully edited');
        return redirect('/dashboard/payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        Payment::destroy($payment->id);
        Alert::success('Success deleting a payment', 'Payment has been successfully deleted');
        return redirect('/dashboard/payments');
    }

    public function print()
    {
        $payments = Payment::get();
        $pdf = Pdf::loadview('dashboard.pages.payment.print', 
            ['payments'=>$payments])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-pembayaran.pdf');
    }
}
