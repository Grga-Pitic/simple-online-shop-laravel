@extends('bootstrap.template')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="breadcrumb-title">Catalog</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Catalog</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->


<!-- main-content-wrap start -->
<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- shop-sidebar-wrap start -->
                <div class="shop-sidebar-wrap">

                    <!-- shop-sidebar start -->
                    <div class="shop-sidebar mb-30">
                        <h4 class="title">FILTER</h4>
                        <!-- filter-price-content start -->
                        <div class="filter-price-content">
                            <form action="#" method="post">
                                <div id="price-slider" data-max="{{$maxPrice}}" class="price-slider"></div>
                                <div class="filter-price-wapper">
                                    <div class="filter-price-cont">
                                        <span>Price:</span>
                                        <div class="input-type">
                                            <input type="text" id="min-price" readonly="" />
                                        </div>
                                        <span>—</span>
                                        <div class="input-type">
                                            <input type="text" id="max-price" style="width: 64px" readonly="" />
                                        </div>
                                        <a class="add-to-cart-button" onclick="updateResults()">
                                            <span>FILTER</span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- filter-price-content end -->
                    </div>
                    <!-- shop-sidebar end -->

                    <!-- shop-sidebar start -->
                    <div class="shop-sidebar mb-30">
                        <h4 class="title">CATEGORIES</h4>
                        <ul>
                            <li><a href="shop.html">brothers <span>(18)</span></a></li>
                            <li><a href="shop.html">hatil <span>(16)</span></a></li>
                            <li><a href="shop.html">Men <span>(6)</span></a></li>
                            <li><a href="shop.html">Women <span>(11)</span></a></li>
                        </ul>
                    </div>
                    <!-- shop-sidebar end -->

                </div>
                <!-- shop-sidebar-wrap end -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row">
                        <div class="col">
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <!-- product-view-mode start -->

                                <div class="product-mode">
                                    <!--shop-item-filter-list-->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active"><a class="active" data-toggle="tab" href="#grid"><i class="ion-ios-keypad-outline"></i></a></li>
                                        <li><a data-toggle="tab" href="#list"><i class="ion-ios-list-outline"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <div class="product-short">
                                    <select class="nice-select" name="quantity" id="quantity">
                                        <option value="20" hidden="" selected>Quantity of results
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="100">100</option>
                                    </select>
                                    <select class="nice-select" name="sortby" id="sortby">
                                        <option value="asc">Price(Low > High)</option>
                                        <option value="desc">Price(High > Low)</option>
                                    </select>
                                </div>
                                <!-- product-short end -->
                            </div>
                            <!-- shop-top-bar end -->
                        </div>
                    </div>
                    <div id="product-list">
                        @include('bootstrap.catalog.list.wrap')
                    </div>


                </div>
                <!-- shop-product-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->

@endsection



@section('jscode')
<script>
function updateResults(page = 0){
    let params = '?';
    var categoryId;
    var count = $('#quantity option:selected').val();
    var minPrice = $('#min-price').val().substring(1);
    var maxPrice = $('#max-price').val().substring(1);
    var sort     = $('#sortby option:selected').val();

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
            $("#product-list").html(data);
        }
    });
}

function send(id){
    $.ajax({
        type:'POST',
        url:'/cart/quickAdd',
        data: {'productId': id,
            'action'   :'a',
            'count'    :1},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $("#msg").html(data);
        }
    });
}
</script>
@endsection