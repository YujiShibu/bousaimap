@extends('layouts.app')

@section('title', '連絡一覧')

@section('content')
<h2>連絡一覧</h2>
<p><a href="{{ route('informations.create') }}" class="btn btn-sm btn-primary">新規登録</a></p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>番号</th>
            <th>連絡</th>
            <th>画像</th>
            <th>登録日時</th>
        </tr>
    </thead>
    <tbody>
        @foreach($informations as $information)
        <tr>
            <td>{{ $information->id }}</td>
            <td>{{ $information->info }}</td>
            <td>
                @if($information->image_path)
                <a href="{{ asset('storage/'.$information->image_path) }}" target="_blank">
                    <img src="{{ asset('storage/'.$information->image_path) }}" width="100">
                </a>
                @else
                
                @endif
            </td>
            <td>{{ $information->created_at->format('m月d日 H時i分') }}</td>
            <td><a href="{{ route('informations.edit', $information->id) }}" class="btn btn-sm btn-primary">編集</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection