<div class="row">
    @foreach($productList as $product)
    <div class="col-lg-4 col-md-4 col-sm-6">
        <!-- single-product-wrap start -->
        <div class="single-product-wrap">
            <div class="product-image">
                <a href="/product/{{$product->getColumnByName('id')}}"><img src="assets/images/product/product-12.jpg" alt="Produce Images"></a>
                <span class="label">{{$product->getColumnByName('discount')}}% Off</span>
                <div class="product-action">
                    <a onclick="send({{$product->getColumnByName('id')}})" class="add-to-cart"><i class="ion-bag"></i></a>
                </div>
            </div>
            <div class="product-content">
                <h3><a href="/product/{{$product->getColumnByName('id')}}">{{$product->getColumnByName('name')}}</a></h3>
                <div class="price-box">
                    <span class="old-price">${{$product->getColumnByName('price')}}</span>
                    <span class="new-price">${{$product->getColumnByName('price')-
                    $product->getColumnByName('price')*$product->getColumnByName('discount')/100}}</span>
                </div>
            </div>
        </div>
        <!-- single-product-wrap end -->
    </div>
    @endforeach
</div>