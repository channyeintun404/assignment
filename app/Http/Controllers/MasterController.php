<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master;
use App\Services\MasterService;

class MasterController extends Controller
{

    protected $masterService;

    public function __construct(MasterService $masterService){

        $this->masterService = $masterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = $this->masterService->getAllMaster();
        return view('home')->with('masters', $masters);
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
          $result = $this->masterService->saveMaster($request);
          if($result['status']==200){
              return redirect('/home')->with('success',$result['message']);
          }else{
            return redirect('/home')->withInput()->with('error',$result['message']);;
          }
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
        $master = $this->masterService->getById($id);
        return view('edit')->with('master',$master);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = $this->masterService->updateMaster($request);
          if($result['status']==200){
              return redirect('/home')->with('success',$result['message']);
          }else{

              return redirect()->back()->with('error',$result['message']);
          }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->masterService->deleteMaster($request);
        return redirect('/home')->with('success','Master Data have been deleted!');
    }
}
