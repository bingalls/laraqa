<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Email</title>
    </head>
    <body>
        <div>
            {{$body}}
        </div>
        <small>Sent from the LaraQA site</small>
    </body>
</html>
