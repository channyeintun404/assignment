@extends('layouts.app')

@section('content')



<link rel="stylesheet" href="{{asset('css/master.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div >
                        <div>
                            <div class="row">
                                <div class="col-md-3" style="float: righ;">
                                    <button type="button" class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#emp-entry">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> 
                                        <i style="font-size: 13px;"> Add New Master Data</i>
                                        </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table table-responsive">
                        <table id="masterlist" class="table table-sm" style="font-size:13px" >
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Id</th>
                                <th scope="col">external_id</th>
                                <th scope="col">name</th>
                                <th scope="col">is_active</th>
                                <th scope="col">created</th>
                                <th scope="col">modified</th>
                                <th scope="col"></th>    
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($masters as $master)
                                <tr>
                                    <td> </td>
                                    <td >{{$master ->id}}</td>
                                    <td >{{$master->external_id}}</td>
                                    <td >{{$master->name}}</td>    
                                    <td >{{$master->is_active}}</td>                
                                    <td >{{$master->created_at}}</td>            
                                    <td >{{$master->updated_at}}</td>
                                    <td>
                                    <form method="POST" action="{{route('delete')}}" >
                                        @csrf
                                        <input type="text" name="id" value="{{$master -> id}}" hidden>
                                        <div  class="row">
                                            <div class="col-sm-2 mr-3"><a href="/master/{{$master->id}}/edit" class="btn btn-sm btn-primary " ><i class="fa fa-pencil fa-fw"></i> edit</a></div>
                                            <div class="col-sm-2"><button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this master data?')"> <i class="fa fa-trash-o fa-fw"></i> delete</button></div>                            
                                        </div>               
                                    </form>
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table> 
                        </div>
                    </div>   
                    
                        <!-- The Master Entry Modal -->
                        <div class="modal" id="emp-entry">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" >
                                <div class="modal-header float-right">
                                    <h5 class="modal-title " id="exampleModalLabel"> Add New Master Data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                    
                                <form method="POST" action="{{route('store')}}" enctype="multipart/form-data" id="form" class="form">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="row">
                                                <div class="form-group">
                                                    <label for="external_id" class="col-form-label"> External Id:  </label>
                                                    <input type="text" class="form-control" id="external_id" name="external_id" placeholder="Please Ender Number" value="{{old('external_id')}}" required>                                                   
                                                 </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label"> Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Please Ender Name"   value="{{old('name')}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="list_order" class="col-form-label"> List Order:  </label>
                                                    <input type="text" class="form-control" id="list_order" name="list_order" placeholder="Please Ender Number"   value="{{old('list_order')}}" required>                                                   
                                                 </div>
                                                <div class="form-group">
                                                    <label for="is_acitve" class="col-form-label"> Is Acitve?</label>
                                                        <div class="input-group">
                                                        <select class="custom-select" id="is_acitve" aria-label="Example select with button addon" name="is_active" required>                                
                                                            <option>Choose...</option>
                                                            <option value="1" >Active</option>
                                                            <option  value="0" >Disable</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div style="float:right">
                                                    <button type="submit" class="btn btn-success" style="width: 80px; font-size:13px;"> <i class="fa fa-plus-square"></i> Add </button>
                                                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 80px; font-size:13px;"><i class="fa fa-trash"></i> Cancel</button>
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