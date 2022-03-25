<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solid Template</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('solid/dist/css/style.css') }}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
							<a href="#">
								<img class="header-logo-image" src="{{ asset('solid/dist/images/logo.svg') }}" alt="Logo">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Selamat Datang Di Van Resto</h1>
	                        <p class="hero-paragraph">Have a nice day</p>
	                        <div class="hero-cta">
                                @if (Route::has('login'))
                                    @auth
                                        <a class="button button-primary" href="{{ route('dashboard') }}">Back To Dashboard</a>
                                    @else
                                        <a class="button button-primary" href="{{ route('login') }}">Login</a>
                                    @endauth
                                @endif
                            </div>
						</div>
                    </div>
                </div>
            </section>

            <section class="features section">
                <div class="container">

                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('solid/dist/js/main.min.js') }}"></script>
</body>
</html>
