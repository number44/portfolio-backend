<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon.3b5f49e1.svg') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="//unpkg.com/alpinejs" defer></script>

		<title>M2M3.pl</title>
		<script type="module" crossorigin src="{{ asset('assets/index.e19faaf0.js') }}"></script>
		<link rel="modulepreload" href="{{ asset('assets/vendor.c783230d.js') }}">
		<link rel="stylesheet" href="{{ asset('assets/index.de26c36d.css') }}">
		<script type="module">!function(){try{new Function("m","return import(m)")}catch(o){console.warn("vite: loading legacy build because dynamic import is unsupported, syntax error above should be ignored");var e=document.getElementById("vite-legacy-polyfill"),n=document.createElement("script");n.src=e.src,n.onload=function(){System.import(document.getElementById('vite-legacy-entry').getAttribute('data-src'))},document.body.appendChild(n)}}();</script>
	</head>
	<body x-data="{sidebar : false}" class="max-w-screen break-words">
		<div class="preloader-bg flex flex-col text-primary">
			<div class="circle">
				<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path class="path" stroke="#972354" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
				</svg>
			</div>
			<h1>loading...</h1>
		</div>
		<div class="progress-container">
			<div class="progress-bar"></div>
		</div>
		<header class="z-30 fixed top-0 left-0 shadow-md bg-white">
			<nav class="max-w-6xl mx-auto px-6">
				<a href="#" class="brand font-extrabold text-2xl"> <img class="logo" src="/assets/logo.bd8f5117.svg" alt="" /> </a>
				<div class="flex h-full">
					<ul class="hidden md:flex">
						<li data-target="about"><a class="hover:text-primary transition-colors uppercase px-3 whitespace-nowrap" href="#">O nas</a></li>
						<li data-target="investments"><a class="hover:text-primary transition-colors uppercase px-3" href="#">Inwestycje</a></li>
						<li data-target="renting"><a class="hover:text-primary transition-colors uppercase px-3" href="#">Wynajem</a></li>
						<li data-target="offers"><a class="hover:text-primary transition-colors uppercase px-3" href="#">Sprzedaż</a></li>
						<li data-target="realizations"><a class="hover:text-primary transition-colors uppercase px-3" href="#">Realizacje</a></li>
					</ul>

					<div @click.away="open = false" x-data="{open:false}" @click="open = !open" class="flex relative items-center px-3 cursor-pointer" id="lang">
						<span class="flex justify-center items-center mr-2 border-l-2 border-zinc-200 pl-3"> PL </span>
						<svg id="lang-icon" class="h-6 w-6 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
						<div
							x-show="open"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100  scale-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100 scale-100"
							x-transition:leave-end="opacity-0"
							class="langs shadow-lg bg-white"
						>
							<a class="link hover:bg-zinc-100 hover:text-primary transition-colors" href="#">PL</a>
							<a class="link hover:bg-zinc-100 hover:text-primary transition-colors" href="#">EN</a>
						</div>
					</div>
					<div class="px-3 flex items-center text-zinc-600 cursor-pointer hover:text-primary transition-colors" x-on:click="sidebar = !sidebar">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
						</svg>
					</div>
				</div>
			</nav>
		</header>
		<aside
			x-show="sidebar"
			x-on:click.away="sidebar=false"
			class="uppercase text-center fixed z-20 bg-white shadow-md h-screen w-64 right-0 top-0 pt-32 flex flex-col"
			x-transition:enter="transition ease-out duration-300"
			x-transition:enter-start="opacity-0 translate-x-72"
			x-transition:enter-end="opacity-100   scale-100 translate-x-0"
			x-transition:leave="transition ease-in duration-300 translate-x-72"
			x-transition:leave-start="opacity-100 scale-100 translate-x-0"
			x-transition:leave-end="opacity-0">
			<a data-target="about" class="leading-4 cursor-pointer p-3 hover:text-primary hover:bg-zinc-100 transition-colors duration-300" href="#">O nas</a>
			<a data-target="investments" class="leading-4 cursor-pointer p-3 hover:text-primary hover:bg-zinc-100 transition-colors duration-300" href="#">Inwestycje</a>
			<a data-target="renting" class="leading-4 cursor-pointer p-3 hover:text-primary hover:bg-zinc-100 transition-colors duration-300" href="#">Wynajem</a>
			<a data-target="offers" class="leading-4 cursor-pointer p-3 hover:text-primary hover:bg-zinc-100 transition-colors duration-300" href="#">Sprzedaż</a>
			<a data-target="realizations" class="leading-4 cursor-pointer p-3 hover:text-primary hover:bg-zinc-100 transition-colors duration-300" href="#">Realizacje</a>

			<a class=" shadow-sm border-2 self-center text-4xl w-16 h-16 center border-primary bg-primary text-white rounded-full transition-colors hover:bg-white hover:text-primary mt-8" href="tel:+503 099 932">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
				</svg>
			</a>
		</aside>
		<section id="hero" class="">
			<div class="max-w-6xl px-3 grid grid-cols-1 gap-2 md:grid-cols-2 md:grid-rows-1 mx-auto min-h-screen">
				<div class="flex justify-center flex-col text-left">
					<div class="box p-3">
						<h1 class="mt-32 md:mt-0 leading-2 font-serif pb-3 font-black text-primary text-4xl sm:text-7xl line-clamp-2">
							Mieszkania <br />
							w Łodzi...
						</h1>
						<p class="text-primary text-lg">Szukasz mieszkania, pokoju ? A może chcesz zainwestować w mieszkania na wynajem. Świetnie trafiłeś, chętnie ci w tym pomożemy</p>
						<div class="btn-group flex text-white mt-4 bg-slate-100 px-3 py-5">
							<div data-target="about" class="flex justify-between items-center border-2 border-primary transition-colors duration-300 cursor-pointer uppercase font-semibold btn px-3 py-2 mr-3 bg-primary rounded-sm hover:bg-white hover:text-primary">
								<span class="mr-2">Więcej</span>
								<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
								</svg>
							</div>
							<div data-target="contact" class="flex cursor-pointer uppercase font-semibold btn px-3 py-2 mr-3 border-primary border-2 text-primary rounded-sm hover:bg-primary hover:text-zinc-100 transition-colors duration-300">
								<span class="mr-2"> Kontakt </span>
								<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
								</svg>
							</div>
						</div>
					</div>
				</div>
				<div class="center">
					<figure class="p-5 shadow rounded">
						<img src="https://images.pexels.com/photos/10334730/pexels-photo-10334730.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" srcset="https://images.pexels.com/photos/10334730/pexels-photo-10334730.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 2x" />
					</figure>
				</div>
			</div>
		</section>

		<section id="about" class="bg-secondary py-24 text-zinc-100">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl pb-24 pt-12 text-center">About</h1>
				<div class="grid grid-cols-1 gap-3 md:grid-cols-2">
					<div class="left mb-24 p-4">
						<h1 class="text-4xl">Lorem, ipsum.</h1>
						<p class="my-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit quo illum veniam voluptatem recusandae eligendi at suscipit ratione nobis eos.</p>
					</div>
					<div class="right">
						<div class="relative">
							<div class="relative dots"></div>
							<img class="relative img" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="investments" class="py-24 text-primary">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl pb-24 pt-12 text-center">Invwestments</h1>
				<div class="grid grid-cols-1 gap-3 md:grid-cols-2">
					<div class="right">
						<div class="relative">
							<div class="relative dots"></div>
							<div class="grid grid-cols-2 gap-3">
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />

								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
							</div>
						</div>
					</div>
					<div class="left mb-24 p-4">
						<h1 class="text-4xl">Lorem, ipsum.</h1>
						<p class="my-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit quo illum veniam voluptatem recusandae eligendi at suscipit ratione nobis eos.</p>
					</div>
				</div>
			</div>
		</section>
		<section id="team" class="bg-primary text-zinc-50 py-24">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl text-center mb-8">Our Team</h1>
				<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 p-3 sm:p-0">
					<div class="member text-center flex flex-col items-center">
						<img class="w-32 h-32 sm:w-48 sm:h-48 rounded-full" src="https://images.pexels.com/photos/839633/pexels-photo-839633.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
						<h1 class="text-2xl sm:text-4xl my-2">Jane Doe</h1>
						<p class="text- text-white opacity-70">Lorem ipsum dolor sit.</p>
					</div>
					<div class="member text-center flex flex-col items-center">
						<img class="w-32 h-32 sm:w-48 sm:h-48 rounded-full" src="https://images.pexels.com/photos/839633/pexels-photo-839633.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
						<h1 class="text-2xl sm:text-4xl my-2">Jane Doe</h1>
						<p class="text- text-white opacity-70">Lorem ipsum dolor sit.</p>
					</div>
					<div class="member text-center flex flex-col items-center">
						<img class="w-32 h-32 sm:w-48 sm:h-48 rounded-full" src="https://images.pexels.com/photos/839633/pexels-photo-839633.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
						<h1 class="text-2xl sm:text-4xl my-2">Jane Doe</h1>
						<p class="text- text-white opacity-70">Lorem ipsum dolor sit.</p>
					</div>
					<div class="member text-center flex flex-col items-center">
						<img class="w-32 h-32 sm:w-48 sm:h-48 rounded-full" src="https://images.pexels.com/photos/839633/pexels-photo-839633.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
						<h1 class="text-2xl sm:text-4xl my-2">Jane Doe</h1>
						<p class="text- text-white opacity-70">Lorem ipsum dolor sit.</p>
					</div>
				</div>
			</div>
		</section>
		<section id="renting" class="py-24 text-primary">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl pb-24 pt-12 text-center">Renting</h1>
				<div class="grid grid-cols-1 gap-3 md:grid-cols-2">
					<div class="right">
						<div class="relative">
							<div class="relative dots"></div>
							<div class="grid grid-cols-2 gap-3">
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />

								<img class="relative img opacity-1" src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
							</div>
						</div>
					</div>
					<div class="left mb-24 p-4">
						<h1 class="text-4xl">Renting</h1>
						<p class="my-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit quo illum veniam voluptatem recusandae eligendi at suscipit ratione nobis eos.</p>
					</div>
				</div>
			</div>
		</section>
		<section id="offers" class="bg-primary py-24 text-zinc-50">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl text-center my-8">Offers</h1>
				<img class="w-32 h-32 mx-auto hover:scale-75 transition-transform cursor-pointer duration-300" src="/assets/logo-bw.8a5996b4.svg" alt="" />
			</div>
		</section>
		<section id="realizations" class="text-primary py-24">
			<div class="max-w-6xl mx-auto">
				<h1 class="text-4xl sm:text-6xl text-center my-8">Realizations</h1>
				<div class="w-32 h-1 bg-primary rounded-md mx-auto"></div>
				<h1 class="text-4xl text-center my-8">Lorem, ipsum.</h1>
				<div class="grid grid-cols-1 md:grid-cols-2 mb-32">
					<div class="">
						<div class="swiper">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>

							<!-- If we need navigation buttons -->

							<!-- If we need scrollbar -->
							<div class="swiper-scrollbar"></div>
						</div>
					</div>
					<div class="p-3">
						<h1 class="text-3xl py-3">Lorem, ipsum.</h1>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa veritatis deserunt impedit? Cupiditate minima amet eum natus, consectetur aspernatur nostrum illo officiis consequatur vel tempore obcaecati quo quos dicta mollitia.</p>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2">
					<div class="">
						<div class="swiper bg-yellow-400">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
								<div class="swiper-slide">
									<img src="https://images.pexels.com/photos/7993504/pexels-photo-7993504.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" />
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>

							<!-- If we need navigation buttons -->

							<!-- If we need scrollbar -->
							<div class="swiper-scrollbar"></div>
						</div>
					</div>
					<div class="p-3">
						<h1 class="text-3xl py-3">Lorem, ipsum.</h1>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa veritatis deserunt impedit? Cupiditate minima amet eum natus, consectetur aspernatur nostrum illo officiis consequatur vel tempore obcaecati quo quos dicta mollitia.</p>
					</div>
				</div>
			</div>
		</section>
		<section id="map" class="overflow-x-hidden h-96 w-full max-w-screen">
			</section>

		<section id="contact" class="mb-8 pt-8">
			<div class="max-w-6xl text-primary py-8 mx-auto text-center flex justify-center items-center flex-col">
				<div class="flex mt-8 justify-center text-center">
					<h2 class="text-4xl sm:text-6xl mb-2">Kontakt</h2>

					<div class="h-2 bg-pr"></div>
				</div>

				<div class="w-32 h-1 mt-8 mb-4 bg-primary rounded-md mx-auto"></div>
				<div>
					<a href="tel:+503099932" class="flex mt-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
						</svg>
						<span class="ml-4 text-lg">503 099 932</span>
					</a>

					<a href="mailto:biuro@rentaroom.pl" class="flex mt-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
						</svg>
						<span class="ml-4 text-lg">biuro@rentaroom.pl</span>
					</a>
					<a href="" class="flex mt-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
						<span class="text-left ml-4 text-lg"
							>Łódź ,<br />
							ul. Sierakowskiego 69</span
						>
					</a>
				</div>
			</div>
		</section>
		<footer class="bg-primary py-8">
			<img class="h-32" src="/assets/logo-bw.8a5996b4.svg" alt="m2m3 - logo" />
		</footer>
		
		<script nomodule>!function(){var e=document,t=e.createElement("script");if(!("noModule"in t)&&"onbeforeload"in t){var n=!1;e.addEventListener("beforeload",(function(e){if(e.target===t)n=!0;else if(!e.target.hasAttribute("nomodule")||!n)return;e.preventDefault()}),!0),t.type="module",t.src=".",e.head.appendChild(t),t.remove()}}();</script>
		<script nomodule id="vite-legacy-polyfill" src="{{ asset('assets/polyfills-legacy.f0685002.js') }}"></script>
		<script nomodule id="vite-legacy-entry" data-src="{{ asset('assets/index-legacy.08822cd0.js') }}">System.import(document.getElementById('vite-legacy-entry').getAttribute('data-src'))</script>
	</body>
</html>
