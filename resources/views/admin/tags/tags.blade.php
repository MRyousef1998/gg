@extends('layouts.app')
@section('content')

<div class="container">
 <div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">categories</div>

                <div class="card-body">
                 <div class="row">
                 @foreach($tags as $tag)
                 <div claas='col-md-3'>

           
            <div class="alert alert-primary" role="alert">
            <p>{{$tag->id}}{{':'}}{{$tag->tag}}</p>

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
