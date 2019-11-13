<td class="plantmore-product-thumbnail"><a href="/product/{{$product->getColumnByName('id')}}">
        <img src="assets/images/other/01.jpg" alt=""></a></td>
<td class="plantmore-product-name">
    <a href="/product/{{$product->getColumnByName('id')}}">{{$product->getColumnByName('name')}}</a></td>
<td class="plantmore-product-price"><span class="amount">${{$product->getColumnByName('price')}}</span></td>
<td class="plantmore-product-quantity"><input value="{{$quantity}}" type="number">
</td>
<td class="product-subtotal"><span class="amount">
        ${{$product->getColumnByName('price') * $quantity}}</span></td>
<td class="plantmore-product-remove"><a onClick="remove({{$product->getColumnByName('id')}})"><i class="ion-close"></i></a></td>
