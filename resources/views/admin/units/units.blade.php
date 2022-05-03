@extends('layouts.app')
@section('content')

<div class="container">
<div class='row'>
 <div  class='col-md-12'>
 <div class="card">
                <div class ="card-header">Units</div>

                 <div class="card-body">
                <form action="" method="post" class="row" >

                @csrf
                
                <div class="form-group col-md-6" >

                <label for="unit_name">Unit Name</label>
                <input type="text" class="form-controler" id="unit_name" name="unit_name" placeholder="Unit Name"  required>

                </div>
                <div class="form-group col-md-6" >

                <label for="unit_code">Unit code</label>
                <input type="text" class="form-controler" id="unit_code" name="unit_code" placeholder="Unit code" required>

                        </div>
                        <div class="form-group col-md-12" >
                        <button type="sumbit" class="btn btn-primary">add unit </button> </div>
</form>
                
             

         <div class="row">
                 @foreach($units as $unit)
             <div claas='col-md-6'>
            <div class="alert alert-primary" role="alert">
            <p>{{$unit->unit_name}}{{':'}}{{$unit->unit_code}}</p>

            </div>
           
             </div>
              @endforeach
                 </div>
           

                </div>
            </div>
            </div>
 </div>
 </div>

<!-- Flexbox container for aligning the toasts -->
<div class="toast" style="position: absolute; z-index:99999; top:5%; right:5%;">

 
    <div class="toast-header">
      
      <strong class="me-auto">Unit added</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">$times;</span>
      </button>
    </div>
    <div class="toast-body">
    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
     
    </div>
  </div>

@endsection
@if(Session::has('message'))
@section('scripts')

<scripts>


jQuery(decument).ready(function($){
$('.toast').toast({
    autoHide :false,
});
$toast.toast('show'); 

}
 
);  
</scripts>

@endsection
@endif
