@extends('layouts.app')

@section('title', '困り事・心配事登録')

@section('content')
<h2>困り事・心配事登録</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('needs.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>困り事・心配事</label>
        <textarea name="content" class="form-control" rows="5" style="width:600px;" required></textarea>
    </div>

    <div class="mb-3">
        <label>対象家庭</label>
        <input type="text" name="name" class="form-control" style="width:400px;" required>
    </div>

    <div class="mb-3">
        <label>報告者名（任意）</label>
        <input type="text" name="reporter" class="form-control" style="width:300px;">
    </div>

    <div class="mb-3">
        <label>報告者電話番号（任意）</label>
        <input type="text" name="phone" class="form-control" style="width:300px;">
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection
