<!DOCTYPE HTML>
<html>
	<head>
		<title>OWIS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="/" class="logo">OWIS</a>
					<nav id="nav">
						@foreach (\App\Models\Page::whereNotNull('view_on_nav')->get() as $page)
							<a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a>
						@endforeach
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Barangay San Nicolas</h1>
					{{-- <ul class="actions">
						<li><a href="#" class="button alt">Get Started</a></li>
					</ul> --}}
				</div>
			</section>

			@foreach (\App\models\Page::where('type', '!=', 'sub')->get() as $page)
			<div >
                <section id="one">
                    <div class="inner">
                        <header>
                            <h2>{{ $page->title }}</h2>
                        </header>
                        <p>
							{!! Str::limit($page->body, 300) !!}
						</p>
						<a href="{{ route('pages.show', $page) }}">Read More...</a>
                    </div>
                </section>
			<hr>

            </div>
			@endforeach
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>