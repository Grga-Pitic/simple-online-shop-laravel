@extends('bootstrap.template')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="breadcrumb-title">Cart</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="plantmore-product-thumbnail">Images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="plantmore-product-price">Unit Price</th>
                                <th class="plantmore-product-quantity">Quantity</th>
                                <th class="plantmore-product-subtotal">Total</th>
                                <th class="plantmore-product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productDataList as $product)
                                <tr id="row{{$product->getColumnByName('id')}}">
                                @include('bootstrap.cart.row', [
                                    'product' => $product,
                                    'quantity' => $productQuantityList[$product->getColumnByName('id')]
                                ])
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="coupon-all">
                                <div class="coupon2">
                                    <input class="submit btn" name="update_cart" value="Update cart" type="submit">
                                    <a href="/catalog" class="btn continue-btn">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$170.00(заглушка)</span></li>
                                    <li>Total <span>$170.00(заглушка)</span></li>
                                </ul>
                                <a href="#" class="proceed-checkout-btn">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->

@endsection


@section('jscode')
<script>
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
            $("#row"+id).html(data);
        }
    });
}

function remove(id){
    $.ajax({
        type:'POST',
        url:'/cart/remove',
        data: {'productId':id},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $("#row"+id).html(data);
        }
    });
}
</script>
@endsection