@extends('layouts.app')

@section('title', '緊急連絡登録')

@section('content')
<h2>緊急連絡登録</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('informations.update', $information->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('informations.index') }}" class="btn btn-secondary">キャンセル</a><br><br>
    <div class="mb-2">
        <label>連絡:
            <textarea name="info" class="form-control" rows="6" style="width: 600px;" required>{{ $information->info }}</textarea>
        </label>
    </div>
    <div class="mb-2">
        <label>画像（あれば差し替え）:
            <input type="file" name="image" class="form-control">
        </label>
        @if($information->image_path)
        <span>現在の画像:</span>
        <img src="{{ asset('storage/' . $information->image_path) }}" class="current-image" alt="Current Image">
        @endif
    </div>
</form>
</div>
@endsection