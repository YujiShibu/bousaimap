<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>地点登録</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>#map { height: 400px; width: 100%; }</style>
</head>
<body>
<h2>防災マップ地点登録</h2>
<p>危険箇所や注意情報を登録してください</p>
<form action="{{ route('hazards.store') }}" method="POST">
    @csrf
    <label>名前: <input type="text" name="name" required></label><br>
    <label>種類: <input type="text" name="type" required></label><br>
    <label>緯度: <input type="text" id="latitude" name="latitude" readonly></label>
    <label>経度: <input type="text" id="longitude" name="longitude" readonly></label><br>
    <button type="submit">登録</button>
</form>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script> <!-- API通信用 -->
<script>
const map = L.map('map').setView([35.411734, 133.801429], 15);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution:'© OpenStreetMap contributors' }).addTo(map);

let marker;

// 地図クリックで座標取得
map.on('click', function(e) {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;

    // マーカー表示
    if (marker) map.removeLayer(marker);
    marker = L.marker([lat, lng]).addTo(map);
});
</script>
</body>
</html>
