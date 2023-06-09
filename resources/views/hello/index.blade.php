<!DOCTYPE html>
<html>

<head>
    <title>Hello/Index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0px -30px 0px;
            letter-spacing: -4pt;
        }
    </style>
</head>
<!-- リスト3-14 -->

<body>
    <h1>Blade/Index</h1>
    <p>{{ $msg }}</p>
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>

</html>


{{-- <html lang="ja">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>



    <p>ここが本文のコンテンツです。</p>

    <table>
        @foreach ($data as $item)
            <tr>
                <th>{{ $item['name'] }}</th>
                <td>{{ $item['mail'] }}</td>
            </tr>
        @endforeach
    </table>


    NOTEリスト4-7
    <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>


</body>

</html> --}}
