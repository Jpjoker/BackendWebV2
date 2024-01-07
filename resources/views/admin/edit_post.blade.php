<!DOCTYPE html>
<html>

<head>
    <base href="/public">

    @include('admin.css')

    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .centerpost {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

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
        <div class="page-content">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"> x </span>
                    </button>
                </div>
            @endif
            <h1 class="post_title">Update Post</h1>

            <form action="{{ url('update_post', $postblog->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="centerpost">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title"
                        value="{{ $postblog->title }}">
                </div>
                <!--uw beschrijving-->
                <div class="centerpost">
                    <label for="title">Description</label>
                    <textarea name="description" id="" cols="30" rows="10">  {{ $postblog->description }}</textarea>
                </div>

                <div class="centerpost">
                    <label>Old image</label>
                    <img style="margin:auto;" height="100px" width="150px" src="/postimage{{ $postblog->image }}"
                        alt="">

                </div>
                <!--foto in geven-->
                <div class="centerpost">
                    <label for="title">Update Old image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="centerpost">
                    <label for="title"></label>
                    <input type="submit" value="Update" class="btn btn_primary">
                </div>

            </form>
        </div>

        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
