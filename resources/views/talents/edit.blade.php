@extends('layouts.app')

@section('title', '人材バンク 編集')

@section('content')
<h2>人材バンク 編集</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('talents.update', $talent->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('talents.index') }}" class="btn btn-secondary">キャンセル</a><br><br>

    <div class="mb-2">
        <label>名前
            <input type="text" name="name" class="form-control" value="{{ $talent->name }}" required>
        </label>
    </div>

    <div class="mb-2">
        <label>説明
            <textarea name="description" class="form-control" rows="4">{{ $talent->description }}</textarea>
        </label>
    </div>

    <div class="mb-2">
        <label>電話番号
            <input type="text" name="phone" class="form-control" value="{{ $talent->phone }}">
        </label>
    </div>

    <div id="map"></div>

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('talents.index') }}" class="btn btn-secondary">キャンセル</a>
</form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([{
        {
            $talent - > latitude
        }
    }, {
        {
            $talent - > longitude
        }
    }], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = L.marker([{
        {
            $talent - > latitude
        }
    }, {
        {
            $talent - > longitude
        }
    }]).addTo(map);

    // 地図クリックで座標更新
    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        if (marker) map.removeLayer(marker);
        marker = L.marker([lat, lng]).addTo(map);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection