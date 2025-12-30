@extends('layouts.app')

@section('title', '施設一覧')

@section('content')
<h2>施設登録</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('shelters.store') }}" method="POST">
    @csrf
    <label>施設名: <input type="text" name="name" required></label><br>
    <label>収容人数: <input type="number" name="capacity"></label><br>
    <label>情報: <input type="text" name="accessibility"></label><br>
    <label>備考: <input type="text" name="description"></label><br>
    <label>緯度: <input type="text" id="latitude" name="latitude" readonly required></label>
    <label>経度: <input type="text" id="longitude" name="longitude" readonly required></label><br>
    <button type="submit">登録</button>
</form>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const map = L.map('map').setView([35.411734, 133.801429], 15);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{ attribution:'© OpenStreetMap contributors'}).addTo(map);

let marker;

// 地図クリックで座標取得
map.on('click', function(e) {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;

    if(marker) map.removeLayer(marker);
    marker = L.marker([lat, lng]).addTo(map);
});
</script>

@endsection
