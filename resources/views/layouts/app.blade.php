<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <router-view></router-view> <!-- This is where routed components will render -->
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>