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
        @if ($categories->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through each category and display --}}
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                {{-- Edit Button --}}
                                <a href="{{ route('faq-categories.edit', $category->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>

                                {{-- Delete Button --}}
                                <form action="{{ route('faq-categories.destroy', $category->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No categories found.</p>
        @endif

        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
