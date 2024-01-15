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

    <style>
        .faq-category {
            margin-bottom: 20px;
        }

        .faq-question {
            font-weight: 600;
            color: #333;
        }

        .faq-answer {
            margin-left: 20px;
            font-style: italic;
            color: #555;
        }

        .user-question-form {
            margin: 20px 0;
            text-align: center;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            padding: 10px 20px;
            background-color: turquoise;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .alert {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }

        .top {
            margin-top: 100px;
        }
    </style>
</head>

<!-- Styles -->


<body>

    <!--NAVBAR/HEADER DONE-->
    @include('home.header')

    {{-- Loop through each category and display its questions --}}
    <div class="top">
        @foreach ($faqCategories as $category)
            <div class="faq-category">
                <h2>{{ $category->name }}</h2>
                @foreach ($category->questions as $question)
                    <div>
                        <p class="faq-question">Q: {{ $question->question }}</p>
                        <p class="faq-answer">A: {{ $question->answer }}</p>

                        {{-- Comments voor deze vraag --}}
                        {{-- @foreach ($question->comments as $comment)
                            <div class="faq-comment">
                                <p>{{ $comment->content }}</p>
                                <p>geplaatst door: {{ $comment->user->name }}</p>
                            </div>
                        @endforeach --}}

                        {{-- Commentaar Formulier --}}
                        @if (auth()->check())
                            <form action="{{ route('faq.comment.store', $question->id) }}" method="POST">
                                @csrf
                                <textarea name="content" placeholder="Plaats een commentaar" required></textarea>
                                <button type="submit">Plaats Commentaar</button>
                            </form>
                        @else
                            <p>Log in om een comment te plaatsen.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach

        {{-- User Question Submission Form --}}
        <div class="user-question-form">
            <form action="{{ route('user.faq.submit') }}" method="POST">
                @csrf
                <textarea type="text" name="user_question" placeholder="Your question" class="form-input"> </textarea>
                <button type="submit" class="form-button">Submit</button>
            </form>
        </div>

        {{-- Display Validation Errors --}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    {{-- User Question Submission Form --}}
    {{-- ... existing form code ... --}}

    <!--section8 DONE-->

    @include('home.footer')



</body>

</html>
