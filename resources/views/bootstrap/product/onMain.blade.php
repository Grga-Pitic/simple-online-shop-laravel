<!-- Start Product Area -->
<div class="porduct-area section-pt section-pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2><span>Dis</span>counts</h2>
                    <p>There are many good discounts to save your money!</p>
                </div>
            </div>
        </div>

        <div class="row product-active-lg-4">
            @foreach($discountList as $product)
            <div class="col-lg-3">
                <!-- single-product-wrap start -->
                <div class="single-product-wrap">
                    <div class="product-image">
                        <a href="/product/{{$product->getColumnByName('id')}}"><img src="assets/images/product/product-01.jpg" alt="Produce Images"></a>
                        <span class="label">{{$product->getColumnByName('discount')}}% Off</span>
                        <div class="product-action">
                            <a class="add-to-cart" onclick="send({{$product->getColumnByName('id')}})"><i class="ion-bag"></i></a>
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
    </div>
</div>
<!-- Start Product End -->