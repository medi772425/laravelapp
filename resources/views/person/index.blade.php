{{-- リスト6-3 --}}
@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

{{-- @section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
@endsection --}}
{{-- リスト6-6 --}}
{{-- @section('content')
    <table>
        <tr>
            <th>Data</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td>
            </tr>
        @endforeach
    </table>
@endsection --}}

{{-- リスト6-36 --}}
{{-- @section('content')
    <table>
        <tr>
            <th>Person</th>
            <th>Board</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td>
                <td>
                    <!-- Personモデルのboardメソッドを呼び出し
                    メソッドの場合->board() と書くはずだが、リレーションした場合は、以下のようにプロパティで扱える
                    プロパティでないと、getData()などが呼び出せない模様 -->
                    @if ($item->board != null)
                        {{ $item->board->getData() }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection --}}

{{-- リスト6-38 --}}
@section('content')
    <table>
        <tr>
            <th>Person</th>
            <th>Board</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td>
                <td>
                    @if ($item->boards != null)
                        <table width="100%">
                            @foreach ($item->boards as $obj)
                                <tr>
                                    <td>{{ $obj->getData() }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
