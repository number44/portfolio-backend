<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/svg+xml" href="{{ asset('ass/favicon.3b5f49e1.svg') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Admin Panel</title>
		<script type="module" crossorigin src="{{ asset('ass/index.0ac55c6a.js') }}"></script>
		<link rel="modulepreload" href="{{ asset('ass/vendor.22960b95.js') }}">
		<link rel="stylesheet" href="{{ asset('ass/index.7bba7206.css') }}">
		<script type="module">!function(){try{new Function("m","return import(m)")}catch(o){console.warn("vite: loading legacy build because dynamic import is unsupported, syntax error above should be ignored");var e=document.getElementById("vite-legacy-polyfill"),n=document.createElement("script");n.src=e.src,n.onload=function(){System.import(document.getElementById('vite-legacy-entry').getAttribute('data-src'))},document.body.appendChild(n)}}();</script>
	</head>
	<body>
		<div id="root"></div>
		
		<script nomodule>!function(){var e=document,t=e.createElement("script");if(!("noModule"in t)&&"onbeforeload"in t){var n=!1;e.addEventListener("beforeload",(function(e){if(e.target===t)n=!0;else if(!e.target.hasAttribute("nomodule")||!n)return;e.preventDefault()}),!0),t.type="module",t.src=".",e.head.appendChild(t),t.remove()}}();</script>
		<script nomodule id="vite-legacy-polyfill" src="{{ asset("ass/polyfills-legacy.a5d088b1.js")  }}"></script>
		<script nomodule id="vite-legacy-entry" data-src="{{ asset('ass/index-legacy.54aa83b5.js') }}">System.import(document.getElementById('vite-legacy-entry').getAttribute('data-src'))</script>
	</body>
</html>
