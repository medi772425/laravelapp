{{-- リスト3-27 --}}
@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ　sectionのmenubarに追加している(liタグの中に書かれる)
@endsection

{{-- リスト5-5 --}}
@section('content')
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
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
