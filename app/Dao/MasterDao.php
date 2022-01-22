<?php

namespace App\Dao;
use Illuminate\Http\Request;
use App\Models\master;
use DB;
use Session;

class MasterDao
{

    protected $master;

    public function __construct(master $master){
        $this->master =$master;
    }

    /**
     *get all master
     */
    public function getAll()
    {       
        $masters = master::all();
        return $masters;
    }

    /**
     *save absent master attendance
     */
    public function saveMaster($data)
    {
        $master = new $this->master;
        $master -> external_id = $data->input('external_id');
        $master -> name = $data->input('name'); 
        $master -> is_active = $data->input('is_active');
        $master -> list_order = 12;
          $result = ['status'=>200];
          try
          {
            // dd($master);
            $master->save();
            $result = [
              'status'=> 200,
              'message'=> "New master have been created!"
            ];
          }catch(\Illuminate\Database\QueryException $ex)
          {
            $result = [
                'status'=> 500,
                'message'=> "Entry Failed!! 
                Please try Again!!!"
            ];
          }
        return $result;
    }

    // get master by Id
    public function getById($id)
    {
        $master = master::find($id);
        return $master;
    }  


    // update master  by Id
    public function updateMaster($data)
    {
      $id=$data->input('id');
      $master = master::find($id);
      $master -> external_id = $data->input('external_id');
      $master -> name = $data->input('name'); 
      $master -> is_active = $data->input('is_active');
      $master -> list_order = $data->input('list_order');

         try
         {
           $master->save();
           $result = [
             'status'=> 200,
             'message'=> "master have been updated!"
           ];
         }catch(\Illuminate\Database\QueryException $ex)
         {
           $result = [
               'status'=> 500,
               'message'=> "Entry Failed!! 
              Please Try Again!!"
           ];
         }
       return $result;
    }   
    // delete master by changing delete_flag
    public function delete($data)
    {
        $id=$data->input('id');
        $master = master::find($id);
        $master->delete();
    }  

    
}