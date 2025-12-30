@extends('layouts.app')

@section('title', '人材バンク登録')

@section('content')
<h2>人材バンク登録</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('talents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label>名前 <input type="text" name="name" class="form-control" required></label>
    </div>
    <div class="mb-2">
        <label>説明:
            <textarea name="description" class="form-control" rows="4"></textarea>
        </label>
    </div>
    <div class="mb-2">
        <label>電話番号（任意） <input type="text" name="phone" class="form-control"></label>
    </div>
    <button type="submit" class="btn btn-primary">登録</button>
</form>
</div>

@endsection