{{-- リスト3-27 --}}
@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ　sectionのmenubarに追加している(liタグの中に書かれる)
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    <!-- リスト3-29 -->
    {{-- @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            これはメッセージの表示です。
        @endslot
    @endcomponent --}}

    <!-- リスト3-30 -->
    @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])

    <!-- リスト3-32 -->
    <ul>
        @each('components.item', $data, 'item')
    </ul>
@endsection

<!-- NOTE リスト3-14 -->
{{-- <body>
    <h1>Blade/Index</h1>
    <p>{{ $msg }}</p>
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body> --}}

<!-- NOTE リスト3-17 -->

{{-- <body>
    <h1>Blade/Index</h1>
    @if ($msg != '')
        <p>こんにちは、{{ $msg }}さん。</p>
    @else
        <p>何か書いて下さい。</p>
    @endif
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>

</html> --}}


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

@section('footer')
    copyright 2020 tuyano.
@endsection
