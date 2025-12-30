@extends('layouts.app')

@section('title', '危険・注意箇所 編集')

@section('content')
    <h2>危険・注意箇所 編集</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('hazards.update', $hazard->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>場所:
                <input type="text" name="name" class="form-control" value="{{ $hazard->name }}" required>
            </label>
        </div>

        <div class="mb-2">
            <label>説明:
                <textarea name="description" class="form-control" rows="4">{{ $hazard->description }}</textarea>
            </label>
        </div>

        <div class="mb-2">
            <label>報告者（任意）:
                <input type="text" name="reporter" class="form-control" value="{{ $hazard->reporter }}">
            </label>
        </div>

        <div class="mb-2">
            <label>電話番号（任意）:
                <input type="text" name="phone" class="form-control" value="{{ $hazard->phone }}">
            </label>
        </div>

        <div class="mb-2">
            <label>画像（あれば差し替え）:
                <input type="file" name="image" class="form-control">
            </label>
            @if($hazard->image_path)
                <span>現在の画像:</span>
                <img src="{{ asset('storage/' . $hazard->image_path) }}" class="current-image" alt="Current Image">
            @endif
        </div>

        <div class="mb-2">
            <label>緯度:
                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $hazard->latitude }}" readonly required>
            </label>
        </div>

        <div class="mb-2">
            <label>経度:
                <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $hazard->longitude }}" readonly required>
            </label>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="resolved" value="1" id="resolved" {{ $hazard->resolved ? 'checked' : '' }}>
            <label class="form-check-label" for="resolved">解決した（対応済み）</label>
        </div>

        <div id="map"></div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('hazards.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
const map = L.map('map').setView([{{ $hazard->latitude }}, {{ $hazard->longitude }}], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

let marker = L.marker([{{ $hazard->latitude }}, {{ $hazard->longitude }}]).addTo(map);

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