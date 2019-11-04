<td>
	<a href="/product/{{$product->getColumnByName('id')}}">{{$product->getColumnByName('name')}}</a>
	({{$quantity}})
</td>
<td width="128px">
	Цена: {{$quantity * $product->getColumnByName('price')}} <br>
	<input type="button" value="+" onClick="edit({{$product->getColumnByName('id')}}, 'a')"/>
	<input type="button" value="-" onClick="edit({{$product->getColumnByName('id')}}, 'r')"/>
	<input type="button" value="Удалить" onClick="edit({{$product->getColumnByName('id')}}, 'ra')"/>
</td>
