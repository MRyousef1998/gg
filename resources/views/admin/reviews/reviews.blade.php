<?php
use Carbon\Carbon;
?>
    @extends('layouts.app')
@section('content')
<div class="container">
 <div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">Review</div>

                <div class="card-body">
                 <div class="row">
                 @foreach($reviews as $review)
                 <div claas='col-md-3'>

           
            <div class="alert alert-primary" role="alert">
            <p>{{$review->customer->formattedName()}}{{':'}}</p>
            <p>Product:{{$review->product->title}}</p>
            <p>Stars:
           
            @for($i=0;$i<$review->stars;$i++)
            <i class="fas fa-star"></i>
            
            @endfor
            @for($i=0;$i<5-$review->stars;$i++)
            <i class="far fa-star"></i>
            
            @endfor
            
           </p>
            <p>Review:{{$review->review}}</p>
            <p>Date:{{ $review->hmanFormatDate() }}</p>


            

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
