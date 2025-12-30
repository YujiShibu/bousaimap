@extends('layouts.app')

@section('title', '緊急連絡登録')

@section('content')
<h2>緊急連絡登録</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('informations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label>連絡:
            <textarea name="info" class="form-control" rows="6" style="width: 600px;" required></textarea>
        </label>
    </div>
    <div class="mb-2">
        <label>画像（あれば）: <input type="file" name="image" class="form-control"></label>
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>
</div>
@endsection