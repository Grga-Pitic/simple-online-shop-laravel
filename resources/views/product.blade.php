@extends('template')

@section('jscode')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function send(){
    $.ajax({
        type:'POST',
        url:'/cart/send',
        data: {'productId': {{$model->getColumnByName('id')}},
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

function sendComment(){
    $.ajax({
        type:'POST',
        url:'/product/{{$model->getColumnByName('id')}}/comment',
        data: {'name':$('#name').val(),
               'text':$('#text').val()},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $("#enterCommentBlock").html(data);
        }
    });
}

</script>
@endsection

@section('title')
    - {{$model->getColumnByName('name')}}
@endsection

@section('menu')
    there's menu
@endsection

@section('content')
    <h1>{{$model->getColumnByName('name')}}</h1> 
    <table width="100%">
        <tr>
            <td width="480", height="320">
                <img src="{{$model->getColumnByName('picture')}}" alt="{{$model->getColumnByName('name')}}" >
            </td>
            <td>
                <div>{{$model->getColumnByName('price')}} р.</div>

                <div><input type="button" name="submit" id="submit" value="Добавить в корзину" onClick = "send()" /></div>
                <div id="msg"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <h2>Описание</h2>
                    <p>{{$model->getColumnByName('description')}}</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <h2>Отзывы</h2>
                    @includeWhen(count($commentList) == 0, 'product.messages.nocomments')
                    @foreach($commentList as $comment)
                        @include('product.comment', ['comment' => $comment])
                    @endforeach
                </div>
                <div id="enterCommentBlock">
                    <form name="comment">
                        <p>
                            <b>Ваше имя:</b><br>
                            <input type="text" name="name" id="name" size="40">
                        </p>
                        <p>Комментарий<Br>
                            <textarea name="comment" id="text" cols="40" rows="3"></textarea></p>
                        <p>
                            <input type="button" value="Отправить" onClick = "sendComment()" />
                            <input type="reset" value="Очистить">
                        </p>
                    </form>
                </div>
            </td>
        </tr>
        </table>
@endsection