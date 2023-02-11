<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  @vite(['resources/css/app.css'])

  @routes()
  @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
  @inertiaHead
</head>

<body class="font-sans leading-none text-gray-700 antialiased">
  @include('sweetalert::alert')
  @inertia
</body>

</html>