<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    public function index()
    {
        
        $data = Registration::orderBy('created_at','asc')->paginate(2);
        return view('backend\registration\index',compact('data',$data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend\registration\addRegistration');        
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
            'name' => 'required',
            'docType' => 'required',
            'docNum' => 'required',
            'trafficName' => 'required',
            'fine' => 'required',            
        ]);
        $data = new Registration;
        $data->name = $request->input('name');
        $data->docType = $request->input('docType');
        $data->docNum = $request->input('docNum');
        $data->branch = $request->input('branch');
        $data->trafficName = $request->input('trafficName');
        $data->offence = $request->input('offence');
        $data->fine = $request->input('fine');
        $data->save();
        return redirect('registration')->withMessage('success','New document is registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Registration::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $query = Registration::find($id);
        return view('backend/registration/editRegistration')->with('query',$query);
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
        $this->validate($request,[
            'name' => 'required',
            'docType' => 'required',
            'docNum' => 'required',
            'trafficName' => 'required',
            'fine' => 'required',            
        ]);

        $data = Registration::find($id);
        $data->name = $request->input('name');
        $data->docType = $request->input('docType');
        $data->docNum = $request->input('docNum');
        $data->branch = $request->input('branch');
        $data->trafficName = $request->input('trafficName');
        $data->offence = $request->input('offence');
        $data->fine = $request->input('fine');
        $data->save();
        return redirect('registration')->withMessage('success','Registration is updated added');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Registration::find($id);
        $data->delete();
        return redirect('registration')->with('success','A document detail  is Deleted');
    }

    public function addRecord($id)
    {        
        $query = Registration::find($id);
        return view('backend/registration/addRecord')->with('query',$query);
    }
    public function updateRecord(Request $request, $id)
    {
        $this->validate($request,[
            'branch' => 'required',
            'offence' => 'required',
            'trafficName' => 'required',
            'fine' => 'required',            
        ]);
        
        $data = Registration::find($id);
        $fine = $request->input('fine');  
        $oldFine = $data->fine;
        $count =$data->count+1;
        if($data->flag=='1')
        {
            $fine +=$oldFine;
        }
        $data = DB::table('registrations')
              ->where('id', $id)
              ->update(['branch' => $request->input('branch'),
                'trafficname' => $request->input('trafficName'),
                'offence' => $request->input('offence'),          
                'fine' => $fine,
                'count'=>$count
              
              ]);
        return redirect('registration')->withMessage('success','Registration is updated ');
    }

}
