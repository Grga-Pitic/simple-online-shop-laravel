@extends('template')


@section('jscode')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script>
function setFilter(page = 0){
	let params = '?';
	var categoryId;
	var count = $('#quantity option:selected').val();
	var minPrice = $('#minPrice').val();
	var maxPrice = $('#maxPrice').val();
	var sort     = $('#sort').is(':checked');

	if(page){
		params += 'page=' + page + '&';
	}

	if(categoryId){
		params += 'category=' + categoryId + '&';
	}

	if(count){
		params += 'productCount=' + count + '&';
	}

	if(minPrice){
		params += 'minPrice=' + minPrice + '&';
	}

	if(maxPrice){
		params += 'maxPrice=' + maxPrice + '&';
	}

	if(sort){
		params += 'orderBy=' + sort + '&';
	}

	history.pushState(null, null, '/catalog' + params);

	$.ajax({
        type:'GET',
        url:'/catalog/page' + params,
        data: {},
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $("#list").html(data);
        }
    });
}
</script>
@endsection



@section('title', 'Каталог')



@section('menu')
	<form name="Filter" id="Filter">
		Цена
		<div>
	    	от:
	    	<input type="text" name="minPrice" id="minPrice" value=""/>
	    </div>
	    <div>
	    	до:
	    	<input type="text" name="maxPrice" id="maxPrice" value=""/>
	    </div>
	    <div>
	    	Сначала дорогие: 
	    	<input type="checkbox" name="sort" id="sort"/>
	    </div>
	    <div>
	    	<input type="button" name="accept" id="accept" value="Применить фильтр" onClick="setFilter()"/>
	    </div>
	    <div>
	    	<select id="quantity">
		        <option value="20" hidden="" selected>Количество товаров на странице
		        <option value ="1">1
		        <option value ="2">2
		        <option value ="20">20
		        <option value ="50">50
		        <option value ="100">100
		    </select>
	    </div>
	</form>
    
@endsection

@section('content')
	{!! $list !!}
@endsection