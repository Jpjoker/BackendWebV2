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


</head>

<style>
    .container-center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }

    .card {
        width: 100%;
        max-width: 800px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        background-color: #007bff;
        border-bottom: none;
    }

    .card-header h3 {
        color: #fff;
    }

    .card-body {
        background-color: #f7f7f7;
        border-top: none;
    }

    .btn-info {
        background-color: turquoise;
        border-color: turquoise;
    }

    .btn-info:hover {
        background-color: lightseagreen;
        border-color: lightseagreen;
    }
</style>

<body>

    @include('home.header')
    <div class="container-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 pb-5">

                <!--Form with header-->

                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3><i class="fa fa-envelope"></i> Contact form</h3>
                                <p class="m-0">Please fill the form and send us</p>
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="name and secondename" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="your@gmail.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                    </div>
                                    <textarea class="form-control" name="message" placeholder="message" required></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="submit" class="btn btn-info btn-block rounded-0 py-2">
                            </div>
                        </div>

                    </div>
                </form>
                <!--Form with header-->

            </div>
        </div>
    </div>


    @include('home.footer')
</body>
