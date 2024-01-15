<!DOCTYPE html>
<html lang="en">


<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScientificalAnimation</title>
    <link rel="stylesheet" href="assests/css/app.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<!-- Styles -->
<style>
    .blog-articles {
        text-align: center;
    }

    .blog-foto {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        height: 300px;
        width: 450px;
        margin: auto;

    }
</style>

<body>
    <!--NAVBAR/HEADER DONE-->
    @include('home.header')

    <div style="text-align: center;" class="blog-articles">
        <article>
            <div class="blog-foto">
                <img style="padding: 20px; height: 300px; width: 450px; margin : auto;"
                    src="{{ asset('blogimages/' . $postblog->image) }}">
            </div>
            <h1><b>{{ $postblog->title }}</b></h1>
            <h4>{{ $postblog->description }}</h4>
            <p>Post by <b>{{ $postblog->user->name }}</b></p>
            <p>Posted on <b>{{ $postblog->created_at }}</b></p>



            {{-- Comments  plaatsen --}}
            <form action="{{ route('postblog.comments.store', $postblog->id) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Plaats een commentaar" required></textarea>
                <button type="submit">Verzenden</button>
            </form>

            @foreach ($postblog->comments as $comment)
                <div>{{ $comment->content }}</div>
                <!-- Verdere weergave van commentaar -->
            @endforeach


            {{-- Comments  delete --}}

            @foreach ($postblog->comments as $comment)
                <div>
                    <p>{{ $comment->content }}</p>
                    <!-- Check if the user is authorized to delete the comment -->
                    @if (auth()->check() &&
                            (auth()->user()->id == $comment->user_id ||
                                auth()->user()->isAdmin()))
                        <form action="{{ route('comment.delete', $comment->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this comment?');">Delete
                                Comment</button>
                        </form>
                    @endif
                </div>
            @endforeach

        </article>
    </div>

    <!--section8 DONE-->
    @include('home.footer')
</body>

</html>
