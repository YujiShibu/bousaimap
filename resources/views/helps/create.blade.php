@extends('layouts.app')

@section('title', '要支援者登録')

@section('content')
<h2>要支援者登録</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('helps.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label>要支援者の大まかな年齢・性別 <input type="text" name="name" class="form-control" required></label>
    </div>
    <div class="mb-2">
        <label>その方の状況や、どのような支援が必要か：:
            <textarea name="description" class="form-control" rows="4"></textarea>
        </label>
    </div>
    <div class="mb-2">
        <label>報告者（任意）: <input type="text" name="reporter" class="form-control"></label>
    </div>
    <div class="mb-2">
        <label>報告者の電話番号（任意）: <input type="text" name="phone" class="form-control"></label>
    </div>
    <div class="mb-2">
        <label>緯度: <input type="text" id="latitude" name="latitude" class="form-control" readonly required></label>
    </div>
    <div class="mb-2">
        <label>経度: <input type="text" id="longitude" name="longitude" class="form-control" readonly required></label>
    </div>

    <div id="map"></div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([35.411734, 133.801429], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker;
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