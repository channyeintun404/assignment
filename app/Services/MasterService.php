<?php

namespace App\Services;

use App\Dao\MasterDao;
use Illuminate\Http\Request;
use App\Models\master;
use DB;

class MasterService
{

    protected $masterDao;

    public function __construct(MasterDao $masterDao){

        $this->masterDao = $masterDao;
    }

    //get all master
    public function getAllMaster(){
        return $this->masterDao->getAll();
    }

    //save new master
    public function saveMaster($request){
        $result = $this->masterDao->saveMaster($request);
        return $result;
    }

    //get master By Id
    public function getById($id){        
        return $this->masterDao->getById($id);
    }

    //update master
    public function updateMaster($data){
        $result = $this->masterDao->updateMaster($data);
        return $result;
    }

    //delete master
    public function deleteMaster($data){        
        $this->masterDao->delete($data);
    }

}
