<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Товары магазина приколов</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
<!--        <script type="text/javascript" src="../js/jquery-3.6.3.js"></script>-->
        @vite('resources/js/jquery-3.6.3.js')
        @vite('resources/js/postJSON.js') 
        <!--<script type="text/javascript" src="resources/js/postJSON.js"></script>   action="/api/insales/scores/update"-->
        
    </head>
    <body>
        <div id="div-form">
            <h2>JSON</h2>
            <form method="post" id="order-form">
            @csrf
                <input type="hidden" class="btn btn-primary" name="id" value="12345">
                <input type="hidden" class="btn btn-primary" name="client_id" value="54321">
                <table border="1" id="orderTable">
                    <caption>Заказ</caption>
                    <tr>
                    <th>Артикль</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    </tr>
                    <tr>
                        <td>
                            3005-12
                            <input type="hidden" class="btn btn-primary" name="article" value="3005-12">
                        </td>
                        <td>
                            Сосиська в тесте
                            <input type="hidden" class="btn btn-primary" name="name" value="Сосиська в тесте">
                        </td>
                        <td>
                            100
                            <input type="hidden" class="btn btn-primary" name="price" value="100">
                        </td>
                        <td>
                            12
                            <input type="hidden" class="btn btn-primary" name="quantity" value="12">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3005-13
                            <input type="hidden" class="btn btn-primary" name="article" value="3005-13">
                        </td>
                        <td>
                            Дырка от бублика
                            <input type="hidden" class="btn btn-primary" name="name" value="Дырка от бублика">
                        </td>
                        <td>
                            340
                            <input type="hidden" class="btn btn-primary" name="price" value="340">
                        </td>
                        <td>
                            3
                            <input type="hidden" class="btn btn-primary" name="quantity" value="3">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3005-14
                            <input type="hidden" class="btn btn-primary" name="article" value="3005-14">
                        </td>
                        <td>
                           Усы Фредди Меркьюри
                            <input type="hidden" class="btn btn-primary" name="name" value="Усы Фредди Меркьюри">
                        </td>
                        <td>
                            900
                            <input type="hidden" class="btn btn-primary" name="price" value="900">
                        </td>
                        <td>
                            90
                            <input type="hidden" class="btn btn-primary" name="quantity" value="90">
                        </td>
                    </tr>
                </table>
                <input type="hidden" class="btn btn-primary" name="status" value="new">
                <input type=submit class="btn btn-primary" value="Посчитать баллы со скидочных товаров в заказе">
            </form>
            <div id="response">
                
            </div>
        </div>
    </body>
</html>