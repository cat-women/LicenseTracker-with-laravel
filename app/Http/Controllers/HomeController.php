<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Message;
use App\Models\Registration;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function search(Request $request)
    {
        $this->validate($request,[
            'docNumber' => 'required',
        ]);
 
        $query =  $request->input('docNumber');
        //$doc = Registration::where('docNum','$query')->get();
        $doc = DB::table('registrations')
                ->where('docNum', '=', $query)
                ->get();

        if(count($doc)>0)
            return view('front.index.search')->withDetails($doc)->withQuery ( $query );
        else //return view ('welcome')->withMessage('No Details found. Try to search again !');
            return redirect('/')->withErrors('Data not found');

    }

    public function showMessage()
    {
        $messages = DB::table('messages')
            ->orderBy('updated_at', 'desc')
            ->get();
            
        return view('/')->withDetail($messages);
    }
    
}
