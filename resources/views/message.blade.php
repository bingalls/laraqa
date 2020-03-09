<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Message Sent</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="/css/grayscale.min.css" rel="stylesheet">

    </head>
    <body>
        <header class="intro">
            <div class="container" style="padding-top: 5rem">
                <button onclick="history.go(-1)">Back</button>
                <p>Message successfully sent</p>
            </div>
        </header>
    </body>
</html>
