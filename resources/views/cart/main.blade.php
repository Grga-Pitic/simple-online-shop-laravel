@extends('template')



@section('jscode')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function clearTheCart(){
	$.ajax({
		type:'GET',
		url:'/cart/clear',
		data: {},
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		},
		success:function(data){
			$("#fieldsList").html(data);
		}
	});
}

function edit(id, action = "a", quantity = 1){
	$.ajax({
		type:'POST',
		url:'/cart/edit',
		data: {'productId':id,
			'action'   :action,
			'count'    :quantity},
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		},
		success:function(data){
			$("#field"+id).html(data);
		}
	});
}
</script>

@endsection



@section('title', 'Корзина')


@section('content')
	<div id = "fieldsList">
		<table border = "0px" width="100%">
			@includeWhen(count($productList) == 0, 'cart.empty')
			@foreach ($productList as $product)
				<tr id="field{{$product->getColumnByName("id")}}">
					@include('cart.field', ['product' => $product, 'quantity' => $productQuantityList[$product->getColumnByName('id')]])
				</tr>
			@endforeach	
		</table>
	</div>
	
@endsection



@section('menu')
	<input type="button" value="Удалить все" onClick="clearTheCart()" />
	<input type="button" value="Оформить заказ"/>
@endsection