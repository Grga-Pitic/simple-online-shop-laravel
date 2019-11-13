<!-- shop-products-wrap start -->
<div class="shop-products-wrap">
    <div class="tab-content">
        <div class="tab-pane active" id="grid">
            <div class="shop-product-wrap">

                @include('bootstrap.catalog.list.hor', ['productList' => $productList])

            </div>
        </div>



        <div class="tab-pane" id="list">
            @include('bootstrap.catalog.list.ver', ['productList' => $productList])
        </div>
    </div>
</div>
<!-- shop-products-wrap end -->

<!-- paginatoin-area start -->
<div class="paginatoin-area">
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <ul class="pagination-box">
                @if($currentPage != 0)
                <li><a class="Previous" href="#"><i class="ion-chevron-left"></i></a>
                </li>
                @endif
                @for($i = 0; $i < $currentPage; $i++)
                    <li><a onclick="updateResults({{$i}})">{{$i+1}}</a></li>
                @endfor
                <li class="active"><a>{{$currentPage+1}}</a></li>
                @for($i = $currentPage + 1; $i < $pagesQuantity; $i++)
                    <li><a onclick="updateResults({{$i}})">{{$i+1}}</a></li>
                @endfor
                @if(($currentPage != $pagesQuantity-1) and ($pagesQuantity != 0))
                <li><a class="Next" href="#"><i class="ion-chevron-right"></i> </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- paginatoin-area end -->