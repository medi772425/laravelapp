{{-- リスト3-27 --}}
@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ　sectionのmenubarに追加している(liタグの中に書かれる)
@endsection

<!-- NOTE リスト4-14 -->
{{-- @section('content')
    <p>{{ $msg }}</p>
    <form action="/hello" method="post">
        <table>
            @csrf
            <tr>
                <th>name: </th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail"></td>
            </tr>
            <tr>
                <th>age: </th>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection --}}

<!-- NOTE リスト4-17 -->
{{-- @section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/hello" method="post">
        <table>
            @csrf
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>
            <tr>
                <th>age: </th>
                <td><input type="text" name="age" value="{{ old('age') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection --}}

<!-- NOTE リスト4-18 -->
{{-- @section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif
    <table>
        <form action="/hello" method="post">
            @csrf
            @if ($errors->has('name'))
                <tr>
                    <th>ERROR</th>
                    <td>
                        @foreach ($errors->get('name') as $error_name)
                            {{ $error_name }}
                        @endforeach
                    </td>
                </tr>
            @endif
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            @if ($errors->has('mail'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('mail') }}</td>
                </tr>
            @endif
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>
            @if ($errors->has('age'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('age') }}</td>
                </tr>
            @endif
            <tr>
                <th>age: </th>
                <td><input type="text" name="age" value="{{ old('age') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
    </table>
    </form>
@endsection --}}

<!-- リスト4-37 -->
@section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif
    <form action="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('msg'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('msg') }}</td>
                </tr>
            @endif
            <tr>
                <th>Message: </th>
                <td><input type="text" name="msg" value="{{ old('msg') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection


{{-- @section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    <!-- リスト3-29 -->
    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            これはメッセージの表示です。
        @endslot
    @endcomponent

    <!-- リスト3-30 -->
    @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])

    <!-- リスト3-32 -->
    <ul>
        @each('components.item', $data, 'item')
    </ul>
@endsection --}}

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
