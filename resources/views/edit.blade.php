@extends('layouts.app')

@section('content')



<link rel="stylesheet" href="{{asset('css/master.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                        <!-- The Master Entry Modal -->
                        <div id="emp-entry">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" >
                                <div class="modal-header float-right">
                                    <h5 class="modal-title " id="exampleModalLabel"> Edit Master Data </h5>
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                    
                                <form method="POST" action="{{route('update')}}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="row">
                                                <div >
                                                <input type="text" class="form-control" id="id" name="id" value="{{$master -> id}}" hidden>
                                                    <div class="form-group">
                                                        <label for="external_id" class="col-form-label"> External Id:  </label>
                                                        <input type="text" class="form-control" id="external_id" name="external_id"  value="{{$master -> external_id}}" required>                                                   
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label"> Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"    value="{{$master -> name}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="list_order" class="col-form-label"> List Order:  </label>
                                                    <input type="text" class="form-control" id="list_order" name="list_order"  value="{{$master -> list_order}}" required>                                                   
                                                 </div>
                                                <div class="form-group">
                                                    <label for="is_acitve" class="col-form-label"> Is Acitve?</label>
                                                        <div class="input-group">
                                                        @if($master -> is_active)
                                                        <select class="custom-select" id="{{$master -> is_active}}" aria-label="Example select with button addon" name="is_active" value="{{$master -> is_active}}">                                
                                                        <option selected value="1">Active</option>
                                                        <option  value="0">Disable</option>
                                                        </select>
                                                        @else
                                                        <select class="custom-select" id="{{$master -> is_active}}" aria-label="Example select with button addon" name="is_active" value="{{$master -> is_active}}">                                
                                                        <option  value="1">Active</option>
                                                        <option selected value="0">Disable</option>
                                                        </select>
                                                        @endif
                                                        </div>
                                                </div>
                                                <div style="float:right">
                                                <button type="submit" class="btn btn-info" style="width: 85px;  font-size:13px;"> <i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                                                <a href="/home" class="btn btn-danger" style="width: 85px;  font-size:13px;"><i class="fa fa-trash"></i> Cancel</a>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </form>
                                </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/master.js')}}"></script>
<?php
// change date m/d/y
function dateCovert($date)
{
$originalDate = $date;
$newDate = date("m/d/Y", strtotime($date));

return $newDate;
}
?>