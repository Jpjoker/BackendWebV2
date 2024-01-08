<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <!--de persoon-->
        <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ url('/homepage') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ url('post_page') }}"> <i class="icon-grid"></i>Add Post </a></li>
        <li><a href="{{ url('/show_post') }}"> <i class="fa fa-bar-chart"></i>Show Post </a></li>
        <li><a href="{{ url('/admin/faq') }}" class="{{ Request::segment(2) == 'faq' ? 'active' : '' }}"> <i
                    class="icon-padnote"></i>FAQ</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>

        <!-- <li><a href="login.html"> <i class="icon-logout"></i></a></li>-->
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>
