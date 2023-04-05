@extends('layouts.app')

@section('content')
    

     <div class="container">
	<div class="row">
	 @forelse ($products as $product)
    
  <div class="col-4  mt-2">
	 <div class="card ">
		  <a href="{{ url('/login') }}"><img src="{{ asset('storage/images/' . $product->image1) }}" 
    class="card-img-top d-none d-md-block" height="250" alt="" />
			<div class="card-body"></a>
				<h4 class="card-title text-center ">{{($product->name)}}</h4>
				<h5 class="card-subtitle text-center">Category: {{($product->category->name) }}</h5>
				<h6 class="card-text text-center mt-2"><i class="fa-solid fa-location-pin px-2"></i>Price :£{{$product->price}}</h6>
				<div class="row">
			<a href="{{ url('/login') }}" class="btn btn-primary justify-content-center text-light mt-2  fw-semibold"
				>Add to Basket</a
			></div>
		</div>
</div>

</div>



		 @empty
         <p>You have no products displaying.</p>
        @endforelse
		</div>
		</div>
		


		
		

@endsection