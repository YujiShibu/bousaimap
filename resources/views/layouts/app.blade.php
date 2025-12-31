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
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
        }

        body {
            background-color: var(--bg-main);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* ナビゲーションバーの改善 */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }

        .navbar-inner {
            max-width: 1440px;
            margin: 0 auto;
            width: 100%;
        }

        .nav-link {
            font-weight: 500;
            transition: color 0.2s ease;
            padding: 0.5rem 1rem !important;
        }

        .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        /* メインコンテンツ */
        .page-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        h1,
        h2,
        h3 {
            color: var(--primary-color);
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        /* マップスタイル */
        #map {
            width: 100%;
            height: 65vh;
            min-height: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* カードスタイル */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .card-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #555;
        }

        /* バッジスタイル */
        .badge {
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
        }

        /* ボタンスタイル */
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-1px);
        }

        /* テーブルスタイル */
        .table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table th {
            font-weight: 600;
            color: var(--primary-color);
            border-bottom: 2px solid #dee2e6;
        }

        /* フォームスタイル */
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 0.6rem 0.75rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        /* レスポンシブ対応 */
        @media (max-width: 768px) {
            .page-container {
                padding: 1rem;
            }

            #map {
                height: 55vh;
                min-height: 350px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .card-title {
                font-size: 1rem;
            }

            .card-text {
                font-size: 0.9rem;
            }

            .badge {
                font-size: 0.75rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.25rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-inner {
                padding: 0.5rem 1rem;
            }

            .page-container {
                padding: 0.75rem;
            }
        }

        /* アラートスタイル */
        .alert {
            border-radius: 10px;
            border: none;
        }

        /* リストグループ */
        .list-group-item {
            border-radius: 8px !important;
            margin-bottom: 0.5rem;
            border: 1px solid #e9ecef;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }
    </style>

    {{-- 画面ごとの追加CSS --}}
    @yield('styles')

</head>

<body>

    <!-- ナビゲーション -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid navbar-inner">

            <a class="navbar-brand fw-semibold" href="{{ route('map.index') }}">
                🗺️ 災害共助マップ
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('map.index') ? 'active' : '' }}"
                            href="{{ route('map.index') }}">マップ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('shelters.*') ? 'active' : '' }}"
                            href="{{ route('shelters.index') }}">施設一覧</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('hazards.*') ? 'active' : '' }}"
                            href="{{ route('hazards.index') }}">危険箇所</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('helps.*') ? 'active' : '' }}"
                            href="{{ route('helps.index') }}">要支援者</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('needs.*') ? 'active' : '' }}"
                            href="{{ route('needs.index') }}">困り事</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('talents.*') ? 'active' : '' }}"
                            href="{{ route('talents.index') }}">人材バンク</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informations.*') ? 'active' : '' }}"
                            href="{{ route('informations.index') }}">連絡</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- メインコンテンツ -->
    <main class="page-container">
        @yield('content')
    </main>

    <!-- フッター（オプション） -->
    <footer class="text-center py-4 mt-5" style="background-color: #f8f9fa;">
        <div class="container">
            <p class="mb-0 text-muted small">© 2025 災害共助マップ</p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- 画面ごとの追加JS --}}
    @yield('scripts')

</body>

</html>