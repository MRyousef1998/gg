@extends('layouts.app')
@section('content')

<div class="container">
 <div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">cities</div>

                <div class="card-body">
                 <div class="row">
                 @foreach($cities as $city)
                 <div claas='col-md-3'>

           
            <div class="alert alert-primary" role="alert">
            <p>{{$city->name}}</p>
            <p>State:{{$city->state->name}}</p> 
            <p>country:{{$city->country->name}}</p> 


            </div>
           
             </div>
              @endforeach
                 </div>
                 
           

                </div>
            </div>
            </div>
 </div>
 </div>


@endsection
