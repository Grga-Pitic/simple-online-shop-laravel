<td class="plantmore-product-thumbnail"><a href="/product/{{$product->getColumnByName('id')}}">
        <img src="assets/images/other/01.jpg" alt=""></a></td>
<td class="plantmore-product-name">
    <a href="/product/{{$product->getColumnByName('id')}}">{{$product->getColumnByName('name')}}</a></td>
<td class="plantmore-product-price"><span class="amount">${{$product->getColumnByName('price')}}</span></td>
<td class="plantmore-product-quantity">Removed from cart! <br/>
    <a onclick="edit({{$product->getColumnByName('id')}}, 'a', {{$quantity}})">Add back?</a>
</td>
<td class="product-subtotal"><span class="amount">
        -</span></td>
<td class="plantmore-product-remove">Already deleted!</td>
