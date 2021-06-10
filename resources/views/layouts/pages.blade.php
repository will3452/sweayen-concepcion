<!DOCTYPE HTML>
<html>
	<head>
		<title>OWIS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="/" class="logo">OWIS</a>
					<nav id="nav">
						@foreach (\App\models\Page::whereNotNull('view_on_nav')->get() as $page)
							<a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a>
						@endforeach
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- One -->
			<div id="about">
                <section id="one">
                    <div class="inner">
                        <header>
                            <h2>@yield('title')</h2>
                        </header>
                        <div>
                            @yield('body')
                        </div>
                    </div>
                </section>
            </div>
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/skel.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>
	</body>
</html>