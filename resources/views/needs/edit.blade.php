@extends('layouts.app')

@section('title', '困り事・心配事編集')

@section('content')
<h2>困り事・心配事編集</h2>
<br><p>↓困りごとや心配事が解決したらチェックを入れて更新してください</p>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('needs.update', $need->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>解決</label>
        <input type="checkbox" name="resolved" value="1" {{ $need->resolved ? 'checked' : '' }}>
    </div>

    <div class="mb-3">
        <label>困り事・心配事</label>
        <textarea name="content" class="form-control" rows="5" style="width:600px;" required>{{ $need->content }}</textarea>
    </div>

    <div class="mb-3">
        <label>対象家庭</label>
        <input type="text" name="name" class="form-control" style="width:400px;" required value="{{ $need->name }}">
    </div>

    <div class="mb-3">
        <label>報告者名（任意）</label>
        <input type="text" name="reporter" class="form-control" style="width:300px;" value="{{ $need->reporter }}">
    </div>

    <div class="mb-3">
        <label>報告者電話番号（任意）</label>
        <input type="text" name="phone" class="form-control" style="width:300px;" value="{{ $need->phone }}">
    </div>

    <button type="submit" class="btn btn-primary">更新する</button>
</form>
@endsection