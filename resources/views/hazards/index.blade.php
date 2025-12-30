@extends('layouts.app')

@section('title', '危険・注意箇所一覧')

@section('content')
<h2>危険・注意箇所一覧</h2>
<p><a href="{{ route('hazards.create') }}" class="btn btn-sm btn-primary">新規登録</a></p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>番号</th>
            <th>場所</th>
            <th>説明</th>
            <th>画像</th>
            <th>状況</th>
            <th>登録日時</th>
            <th>更新日時</th>
            <th>編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hazards as $hazard)
        <tr>
            <td>{{ $hazard->id }}</td>
            <td>{{ $hazard->name }}</td>
            <td>{{ $hazard->description }}</td>
            <td>
                @if($hazard->image_path)
                <a href="{{ asset('storage/'.$hazard->image_path) }}" target="_blank">
                    <img src="{{ asset('storage/'.$hazard->image_path) }}" width="100">
                </a>
                @else
                画像なし
                @endif
            </td>
            <td>{{ $hazard->resolved ? '解決' : '' }}</td>
            <td>{{ $hazard->created_at }}</td>
            <td>{{ $hazard->updated_at }}</td>
            <td><a href="{{ route('hazards.edit', $hazard->id) }}" class="btn btn-sm btn-primary">編集</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection