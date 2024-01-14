<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScientificalAnimation</title>
    <link rel="stylesheet" href="assests/css/app.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>

    @include('home.header')

    <div class="blog">
        <div class="blog-blok1">
            <div class="blog-title-text">
                <p>latest</p>
                <h2>Discover the Latest Blogs</h2>
                <p>Stay updated with our informative blog posts.</p>
                <button>View all</button>
            </div>
        </div>

        <div class="blog-blok2">
            @foreach ($postblogs as $postblog)
                <div class="blog-articles">
                    <article>
                        <div class="blog-foto">
                            <img style="margin-bottom: 20px; height: 200px" width="350px"
                                src="{{ asset('blogimages/' . $postblog->image) }}">
                        </div>

                        <h4>{{ $postblog->title }}</h4>

                        <p>Post by <b>{{ $postblog->user->name }}</b></p>
                        <a href="{{ url('post_details', $postblog->id) }}"> <button>Read More </button> </a>
                    </article>
                </div>
            @endforeach
        </div>

    </div>
    @include('home.footer')

</body>
