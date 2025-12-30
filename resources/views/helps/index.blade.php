@extends('layouts.app')

@section('title', '要支援者一覧')

@section('content')
<h2>要支援者一覧</h2>
<p><a href="{{ route('helps.create') }}" class="btn btn-sm btn-primary">新規登録</a></p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>番号</th>
            <th>年齢・性別</th>
            <th>状況など</th>
            <th>登録日時</th>
            <th>更新日時</th>
            <th>安否確認</th>
            <th>編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach($helps as $help)
        <tr>
            <td>{{ $help->id }}</td>
            <td>{{ $help->name }}</td>
            <td>{{ $help->description }}</td>
            <td>{{ $help->created_at }}</td>
            <td>{{ $help->updated_at }}</td>
            <td>{{ $help->resolved ? '確認済' : '' }}</td>
            <td><a href="{{ route('helps.edit', $help->id) }}" class="btn btn-sm btn-primary">編集</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection