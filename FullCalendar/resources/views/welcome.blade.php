<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
				@vite('resources/css/app.css')
    </head>
    <body>
		<div id='calendar' style="max-width: 1100px; margin: 40px auto;"></div>
		<x-full-calendar domId="calendar" />
    </body>
</html>
