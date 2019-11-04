<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('jscode')

        <title>OnlineShop  @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #f7f7f7;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            td {
                padding: 5px; /* Поля в ячейках */
                vertical-align: top; /* Выравнивание по верхнему краю ячеек */
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div>
            <p>
                <a href="/">Главная</a>
                <a href="/news">Новости</a>
                <a href="/catalog">Каталог</a>
                <a href="/contacts">Контакты</a>
                <a href="/cart">Корзина</a>
            </p>
        </div>
        
        <table border="1" width="100%" height="100%">
        <tr>
            <td width="160">
                @yield('menu')
            </td>
            <td>
                @yield('content')
            </td>
            <td width="160"><!-- подушка --></td>
        </tr>
        <tr height="100">
            <td></td>
            <td align="right">
                <?php 
                echo "footer";
                ?>
            </td>
            <td></td>
        </tr>
        </table>
    </body>
</html>