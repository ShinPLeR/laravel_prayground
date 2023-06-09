<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <title>Livewire CHAT</title>
  @livewireStyles
</head>
<body>
<header class="header">
  <x-header></x-header>
</header>
<main class="main">
  <x-layout></x-layout>
</main>
@livewireScripts
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
