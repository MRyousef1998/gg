@extends('layouts.app')
@section('content')

<div class="container">
 <div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">Products</div>

                <div class="card-body">
                 <div class="row">
                 @foreach($products as $product)
             <div claas='col-md-3'>
            <div class="alert alert-primary" role="alert">
            <h5>{{$product->title}}{{':'}}</h5>
            <p>Categorey: {{$product->category->name}}</p>
            <p>Price:{{$currency_code}} {{$product->price}}</p>


            <img  src="{{  ( count($product->images)>0) ? $product->images[0]->url : '' }} " alt="" class="img-thumbnaiol card-img">
           
           
           

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
