@extends('layouts.app')

@section('title', '災害共助マップ')

@section('content')
    <div id="map"></div>
@endsection

@section('scripts')
<script>
    const map = L.map('map').setView([35.411734, 133.801429], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const hazards = @json($hazards);
    hazards.forEach(h => {
        L.marker([h.latitude, h.longitude], {icon: L.icon({iconUrl: '/images/hazard.png', iconSize:[30,30]})})
        .addTo(map)
        .bindPopup(`<b>${h.id}</b><br><b>${h.name}</b><br><img src="/storage/${h.image_path}" width="100"><br>${h.description}`);
    });

    const shelters = @json($shelters);
    shelters.forEach(s => {
        L.marker([s.latitude, s.longitude], {icon: L.icon({iconUrl: '/images/shelter.png', iconSize:[30,30]})})
        .addTo(map)
        .bindPopup(`<b>${s.name}</b><br>収容人数: ${s.capacity}<br>バリアフリー: ${s.accessibility}`);
    });

    const helps = @json($helps);
    helps.forEach(h => {
        L.marker([h.latitude, h.longitude], {icon: L.icon({iconUrl: '/images/help.png', iconSize:[30,30]})})
        .addTo(map)
        .bindPopup(`<b>${h.id}</b><br><b>${h.name}</b><br>状況: ${h.description}`);
    });
</script>
@endsection
