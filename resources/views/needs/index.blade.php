@extends('layouts.app')

@section('title', '困り事・心配事一覧')

@section('content')
<h2>困り事・心配事一覧</h2>
<p>困っている事や心配な事があれば入力してください。助けになれるかもしれません。</p>

<p><a href="{{ route('needs.create') }}" class="btn btn-primary btn-sm">新規登録</a></p>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>番号</th>
            <th>困り事や心配事</th>
            <th>対象家庭</th>
            <th>報告者名（任意）</th>
            <th>報告者電話番号（任意）</th>
            <th>解決</th>
            <th>登録日時</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($needs as $need)
        <tr>
            <td>{{ $need->id }}</td>
            <td>{{ $need->content }}</td>
            <td>{{ $need->name }}</td>
            <td>{{ $need->reporter }}</td>
            <td>{{ $need->phone }}</td>
            <td>{{ $need->resolved ? '済' : '' }}</td>
            <td>{{ $need->created_at->format('m月d日 H:i') }}</td>
            <td>
                <a href="{{ route('needs.edit', $need->id) }}" class="btn btn-sm btn-primary">編集</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
