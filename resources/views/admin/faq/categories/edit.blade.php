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
        {{-- Form to edit an existing FAQ category --}}
        <form method="POST" action="{{ route('faq-categories.update', $faqCategory->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $faqCategory->name }}">
            <!-- Rest of your form fields -->

            <button type="submit">Update Category</button>
        </form>


        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
