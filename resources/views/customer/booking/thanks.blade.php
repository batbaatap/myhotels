@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  {{-- <li><a href="#">Home</a></li> --}}
			  <li class="active">Баярлалаа</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			{{-- <h3>YOUR COD ORDER HAS BEEN PLACED</h3> --}}
			<h3>Таны захиалгыг хүлээн авлаа</h3>
			{{-- <p>Your order number is {{ Session::get('order_id') }} and total payable about is INR {{ Session::get('grand_total') }}</p> --}}
			<a href="/" class="btn btn-success float-left" onclick="myFunction()"><i class="fas fa-angle-double-left"></i> Нүүр хуудас руу буцах</a>
		</div>
	</div>
</section>

@endsection
