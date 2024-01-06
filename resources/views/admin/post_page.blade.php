<!DOCTYPE html>
<html>

<head>
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
    </style>
</head>

<body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <!-- pagina content-->
        <div class="page-content">

            <h1 class="post_title">Add post</h1>
            <div>

                <!--enctype="multipart/form-data" is nodig om een foto te uploaden thx copilot-->
                <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
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
