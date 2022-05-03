@extends('layouts.app')
@section('content')

<div class="container">
 <div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">States</div>

                <div class="card-body">
                 <div class="row">
                 @foreach($states as $state)
                 <div claas='col-md-3'>

           
            <div class="alert alert-primary" role="alert">
            <p>{{$state->name}}{{':'}}</p>
            <p>{{$state->country->name}}</p>
            

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
