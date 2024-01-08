<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
</head>

<body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <!-- Sidebar Navigation end-->

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true"> x </span>
                </button>
            </div>
        @endif


        <h1 class="post_title">Add post</h1>
        <div>

            <!--enctype="multipart/form-data" is nodig om een foto te uploaden thx copilot-->
            <form action="{{ url('admin.faq.list') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--title in geven-->
                <div class="centerpost">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title">
                </div>
                <!--uw beschrijving-->
                <div class="centerpost">
                    <label for="title">Description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <!--foto in geven-->
                <div class="centerpost">
                    <label for="title">Add image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="centerpost">
                    <label for="title"></label>
                    <input type="submit" class="button_primary">
                </div>
            </form>
        </div>
    </div>

    <!-- Page Footer-->
    @include('admin.footer')
</body>

</html>
