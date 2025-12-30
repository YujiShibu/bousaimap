@extends('layouts.app')

@section('title', '施設一覧')

@section('content')
<h2>施設一覧</h2>
<p><a href="{{ route('shelters.create') }}" class="btn btn-sm btn-primary">新規登録</a></p>

{{-- PC用テーブル --}}
<div class="d-none d-md-block">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>番号</th>
                <th>施設名</th>
                <th>収容人数</th>
                <th>情報</th>
                <th>備考</th>
                <th>緯度</th>
                <th>経度</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shelters as $shelter)
            <tr>
                <td>{{ $shelter->id }}</td>
                <td>{{ $shelter->name }}</td>
                <td>{{ $shelter->capacity }}</td>
                <td>{{ $shelter->accessibility }}</td>
                <td>{{ $shelter->description }}</td>
                <td>{{ $shelter->latitude }}</td>
                <td>{{ $shelter->longitude }}</td>
                <td>
                    <a href="{{ route('shelters.edit', $shelter->id) }}" class="btn btn-sm btn-primary">編集</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- スマホ用カード --}}
<div class="d-md-none">
    @foreach($shelters as $shelter)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $shelter->name }}</h5>
            <p class="card-text mb-1"><strong>収容人数:</strong> {{ $shelter->capacity }}</p>
            <p class="card-text mb-1"><strong>情報:</strong> {{ $shelter->accessibility }}</p>
            <p class="card-text mb-1"><strong>備考:</strong> {{ $shelter->description }}</p>
            <p class="card-text mb-1"><strong>緯度:</strong> {{ $shelter->latitude }} | <strong>経度:</strong> {{ $shelter->longitude }}</p>
            <a href="{{ route('shelters.edit', $shelter->id) }}" class="btn btn-primary btn-sm w-100 mt-2">編集</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
