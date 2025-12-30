@extends('layouts.app')

@section('title', '要支援者 編集')

@section('content')
<h2>要支援者 編集</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('helps.update', $help->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('helps.index') }}" class="btn btn-secondary">キャンセル</a><br><br>
    <div class="form-check mb-3">
        <p>↓安否が確認できた場合はチェックしてください</p>
        <input type="checkbox" class="form-check-input" name="resolved" value="1" id="resolved" {{ $help->resolved ? 'checked' : '' }}>
        <label class="form-check-label" for="resolved">安否確認済</label>
    </div>

    <div class="mb-2">
        <label>要支援者の大まかな年齢・性別:
            <input type="text" name="name" class="form-control" value="{{ $help->name }}" required>
        </label>
    </div>

    <div class="mb-2">
        <label>その方の状況や、どのような支援が必要か:
            <textarea name="description" class="form-control" rows="4">{{ $help->description }}</textarea>
        </label>
    </div>

    <div class="mb-2">
        <label>報告者（任意）:
            <input type="text" name="reporter" class="form-control" value="{{ $help->reporter }}">
        </label>
        <label>電話番号（任意）:
            <input type="text" name="phone" class="form-control" value="{{ $help->phone }}">
        </label>
    </div>

    <div class="mb-2">
        <label>緯度:
            <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $help->latitude }}" readonly required>
        </label>
        <label>経度:
            <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $help->longitude }}" readonly required>
        </label>
    </div>



    <div id="map"></div>

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('helps.index') }}" class="btn btn-secondary">キャンセル</a>
</form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([{
        {
            $help - > latitude
        }
    }, {
        {
            $help - > longitude
        }
    }], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = L.marker([{
        {
            $help - > latitude
        }
    }, {
        {
            $help - > longitude
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