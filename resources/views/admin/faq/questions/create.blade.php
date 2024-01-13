<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')

    <style>
        body {
            background-color: #1F1F1F;
        }
    </style>
</head>



<body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <!-- Sidebar Navigation end-->
        {{-- Form to create a new FAQ question --}}
        <form method="POST" action="{{ route('faq-questions.store') }}">
            @csrf
            <label for="category_id">Category:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="question">Question:</label>
            <input type="text" name="question" placeholder="Enter the question">

            <label for="answer">Answer:</label>
            <textarea name="answer" placeholder="Enter the answer"></textarea>

            <button type="submit">Create Question</button>
        </form>


        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
