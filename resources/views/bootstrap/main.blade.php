@extends('bootstrap.template')



@section('content')

@include('bootstrap.product.onMain', ['discountsList' => $discountList])
@include('bootstrap.news.onMain')

@endsection



@section('jscode')
<script>
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