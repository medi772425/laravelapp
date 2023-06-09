<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- @section('content') --}}
    <p>ここが本文のコンテンツです。</p>
    {{-- <table>
        @foreach ($data as $item)
            <tr>
                <th>{{ $item['name'] }}</th>
                <td>{{ $item['mail'] }}</td>
            </tr>
        @endforeach
    </table> --}}

    {{-- NOTEリスト4-7 --}}
    <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
    {{-- @endsection --}}

</body>

</html>
