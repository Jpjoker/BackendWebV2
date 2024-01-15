<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScientificalAnimation</title>
    <link rel="stylesheet" href="assests/css/app.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>


<style>
    .top {
        margin-top: 300px;

    }
</style>

<body>

    @include('home.header')

    <div class="top">
        <form action="/checkout" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit">Checkout</button>
        </form>
    </div>



    @include('home.footer')
</body>
