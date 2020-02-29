<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Fjord Playground</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style media="screen">
        body {
          min-height: 75rem;
          padding-top: 4.5rem;
        }
    </style>
</head>

<body>
    <div id="app">
        @include('partials.nav')
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
