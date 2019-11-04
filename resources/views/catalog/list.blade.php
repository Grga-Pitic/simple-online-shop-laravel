<div id="list">
	<p>Найдено товаров: {{$listSize}}</p>
	<p>Результатов на странице: {{$pageSize}}</p>
	<table width="100%">

		@foreach($productList as $product)
			<tr>
				<td>
					<b><a href="/product/{{$product->getColumnByName('id')}} ">{{$product->getColumnByName('name')}}</a></b> 
					<p>
						{{$product->getColumnByName('description')}}     {{$product->getColumnByName('price')}} руб.
					</p>
				</td>
			</tr>
		@endforeach

	</table>

	@for($i = 0; $i < $currentPage; $i++)
		<input type="button" name="p{{$i}}" id="{{$i}}" value="{{$i + 1}}" onClick="setFilter({{$i}})"/>
	@endfor
	<input type="button" name="p{{$currentPage}}" id="{{$currentPage}}" value="{{$currentPage + 1}}" onClick="setFilter({{$currentPage}})" disabled/>
	

	@for($i = $currentPage + 1; $i < $pagesQuantity; $i++)
		<input type="button" name="p{{$i}}" id="{{$i}}" value="{{$i + 1}}" onClick="setFilter({{$i}})"/>
	@endfor

</div>
