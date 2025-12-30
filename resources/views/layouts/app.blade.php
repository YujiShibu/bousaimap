<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', '災害共助マップ')</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        :root {
            --bg-main: #f5f7fa;
        }

        body {
            background-color: var(--bg-main);
        }

        .page-container {
            max-width: 1440px;
            margin: auto;
            padding: 16px;
        }

        h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        #map {
            width: 100%;
            height: 65vh;
            min-height: 360px;
        }

        @media (max-width: 768px) {
            #map {
                height: 55vh;
            }

            .card {
                border-radius: 12px;
            }

            .card-title {
                font-size: 1rem;
                font-weight: 600;
            }

            .card-text {
                font-size: 0.9rem;
                line-height: 1.4;
            }

            .badge {
                font-size: 0.75rem;
            }

            .btn {
                padding: 10px;
            }
        }
    </style>

    {{-- 画面ごとの追加CSS --}}
    @yield('styles')

</head>

<body>

    <!-- ナビゲーション -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-inner px-3">

            <a class="navbar-brand fw-semibold" href="{{ route('map.index') }}">
                災害共助マップ
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('map.index') }}">マップ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shelters.index') }}">施設一覧</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hazards.index') }}">危険・注意箇所</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('helps.index') }}">要支援者</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('needs.index') }}">困り事</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('talents.index') }}">人材バンク</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('informations.index') }}">連絡</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- メインコンテンツ -->
    <main class="page-container">
        @yield('content')
    </main>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- 画面ごとの追加JS --}}
    @yield('scripts')

</body>

</html>