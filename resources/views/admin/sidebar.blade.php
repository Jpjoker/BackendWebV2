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
        <li class="active"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ url('post_page') }}"> <i class="icon-grid"></i>Add Post </a></li>
        <li><a href="{{ url('/show_post') }}"> <i class="fa fa-bar-chart"></i>Show Post </a></li>


        <!-- Dropdown for FAQ Categories -->
        <li>
            <a href="#faqCategoryDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-padnote"></i>FAQ Categories
            </a>
            <ul id="faqCategoryDropdown">
                <li><a href="{{ route('faq-categories.create') }}">Add Category</a></li>
                <li><a href="{{ route('faq-categories.index') }}">Show Categories</a></li>
            </ul>
        </li>

        <!-- Dropdown for FAQ Questions -->
        <li>
            <a href="#faqQuestionDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-writing-whiteboard"></i>FAQ Questions
            </a>
            <ul id="faqQuestionDropdown">
                <li><a href="{{ route('faq-questions.create') }}">Add Question</a></li>
                <li><a href="{{ route('faq-questions.index') }}">Show Questions</a></li>
            </ul>
        </li>


        <!-- Example dropdown... -->
        {{-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li> --}}

        <!-- <li><a href="login.html"> <i class="icon-logout"></i></a></li>-->
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>
