<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .title_showpost {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;


        }

        .table_showpost {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 120px;
        }

        .tr_th_showpost {
            background-color: lightblue;
            border: 1px solid white;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .img_showpost {
            width: 100px;
            height: 100px;
            padding: 8px;
        }
    </style>
</head>

<body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <div class="page-content">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"> x </span>
                    </button>
                </div>
            @endif
            <h1 class="title_showpost"> All Posts </h1>

            <table class="table_showpost">

                <tr class="tr_th_showpost">
                    <th>Post Title</th>
                    <th>Post Content</th>
                    <th>Post by</th>
                    <th>Post status</th>
                    <th>Usertype</th>
                    <th>Post image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Publishing date</th>

                </tr>


                @foreach ($postblogs as $postblog)
                    <tr class="tr_td_showpost">
                        <td>{{ $postblog->title }}</td>
                        <td>{{ $postblog->description }}</td>
                        <td>{{ $postblog->name }}</td>
                        <td>{{ $postblog->post_status }}</td>
                        <td>{{ $postblog->usertype }}</td>

                        <td> <img class="img_showpost" src="blogimages/{{ $postblog->image }}">

                        </td>

                        <td>
                            <a href="{{ url('delete_post/' . $postblog->id) }}" class="btn btn-danger"
                                onclick="return confirm('You sure to delete this post?')">Delete</a>
                        </td>

                        <td>

                            <a href="{{ url('edit_post/' . $postblog->id) }}" class="btn btn-primary">Edit</a>

                        </td>
                        <!--gepost op the Day it self ;P-->
                        <td>{{ $postblog->created_at }}</td>

                    </tr>
                @endforeach

            </table>


        </div>


        <!-- Page Footer-->
        @include('admin.footer')
</body>

</html>
