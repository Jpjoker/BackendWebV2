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
        {{-- Form to edit an existing FAQ question --}}
        <form method="POST" action="{{ route('faq-questions.update', $faqQuestion->id) }}">
            @csrf
            @method('PUT')
            <label for="category_id">Category:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $faqQuestion->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="question">Question:</label>
            <input type="text" name="question" value="{{ $faqQuestion->question }}" placeholder="Enter the question">

            <label for="answer">Answer:</label>
            <textarea name="answer" placeholder="Enter the answer">{{ $faqQuestion->answer }}</textarea>

            <button type="submit">Update Question</button>
        </form>



        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
