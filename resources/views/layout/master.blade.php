<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', '')Plock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/css/app.css">

    {{-- custom css --}}
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body>
    @yield('page', '')

    <script src="/js/app.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/livestamp/1.1.2/livestamp.min.js"></script>
</body>
</html>