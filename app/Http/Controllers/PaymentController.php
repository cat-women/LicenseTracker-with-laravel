<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\payment;
use App\Models\Registration;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email'],
            'upload' => ['required', 'image']
        ]);
    }

    protected function storeImage(Request $request) {
        $path = $request->file('upload')->store('public/payment');
        return substr($path, strlen('public/'));
      }

    public function index()
    {
        //$data = DB::table('payments')->get();

        $data = DB::table('payments')
            ->join('registrations', 'payments.payment_id', '=', 'registrations.id')
            ->select('payments.*', 'registrations.name', 'registrations.docNum','registrations.fine','registrations.flag','registrations.count')
            ->get();

        return view('backend.payment.index', ['data' => $data]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $imageUrl = $this->storeImage($request);
        print($imageUrl);
        
        $data = new payment;
        //$data['photo'] = $imageUrl;
        $data->payment_id = $request->input('docNum');
        $data->email = $request->input('email');
        $data->contact = $request->input('contact');
        $data->upload = $imageUrl;
        $data->save();
        return redirect('/')->withSuccess('Your payment will be confirmed by mail');

        
                        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
