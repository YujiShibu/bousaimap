@extends('layouts.app')

@section('title', '人材バンク')

@section('content')
<h2>人材バンク</h2>
<p><a href="{{ route('talents.create') }}" class="btn btn-sm btn-primary">新規登録</a></p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>番号</th>
            <th>名前</th>
            <th>説明</th>
            <th>電話番号</th>
            <th>登録日時</th>
            <th>更新日時</th>
        </tr>
    </thead>
    <tbody>
        @foreach($talents as $talent)
        <tr>
            <td>{{ $talent->id }}</td>
            <td>{{ $talent->name }}</td>
            <td>{{ $talent->description }}</td>
            <td>{{ $talent->phone }}</td>
            <td>{{ $talent->created_at }}</td>
            <td>{{ $talent->updated_at }}</td>
            <td><a href="{{ route('talents.edit', $talent->id) }}" class="btn btn-sm btn-primary">編集</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection