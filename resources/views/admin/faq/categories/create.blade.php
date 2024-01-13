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
        {{-- Check for a success message in the session --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Form to create a new FAQ category --}}
        <form method="POST" action="{{ route('faq-categories.store') }}" style="margin-top: 20px;">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name"
                    placeholder="Enter category name">
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-top: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="name">Category Name:</label>
        <input type="text" name="name" placeholder="Category Name" style="margin-bottom: 10px;">

        <button type="submit" style="cursor: pointer;">Create Category</button>
        </form>
    </div>

    <!-- Page Footer-->
    @include('admin.footer')
</body>

</html>
