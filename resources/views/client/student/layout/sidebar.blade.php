<!-- Start Page Title Area -->
<div class="page-title-area item-bg-2">
    <div class="container">
        <div class="page-title-content">
            <h2>Student Panel</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Blog Details Area -->
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <aside class="widget-area" id="secondary">
                    <section class="widget widget_categories">
                        <h3 class="widget-title"><i class="fa fa-book"></i> Student Panel</h3>
                        <ul>
                            <li> <a href="{{url('/student/dashboard')}}" class="active2"> <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard <span></span></a> </li>
                            <!-- <li> <a href="{{url('/student/video')}}"> <i class="fa fa-youtube"></i>Video <span></span></a> </li> -->
                            @php
                                $courses = session()->get('courses');
                            @endphp
                            <nav class="nav leftmenu" role="navigation">
                                <ul class="nav__list">
                                    <li class='sub-menu'><a href='#settings'>
                                        <i class="fa fa-book"></i> My Courses<div class='fa fa-caret-down right'></div></a>
                                        <ul  class="block">
                                            @if(! empty($courses))
                                            @foreach($courses as $course)
                                                <li class='sub-menu'>
                                                    <a href="javascript:void(0);">
                                                        {{ $course['course_name'] }}
                                                        <div class='fa fa-caret-down right'></div></a>
                                                    <ul class="block">
                                                        @if(! empty($course['course_topic']))
                                                        @foreach($course['course_topic'] as $topic)
                                                        <li><a href="{{url('/student/my-course')}}/{{ $course['course_name'] }}/{{ $topic['subject_title'] }}" class="active2">{{ $topic['subject_title'] }}</a></li>
                                                        @endforeach
                                                        @endif
                                                    </ul>

                                                </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <li> <a href="{{url('/student/payment-history')}}"> <i class="fa fa-pencil-square-o"></i>Payment History</a> </li>
                            <li> <a href="{{url('/student/course-docs')}}"> <i class="fa fa-pencil-square-o"></i>Course Docs</a> </li>
                            <li> <a href="{{url('/student/my-profile')}}"> <i class="fa fa-user"></i> My Profile<span> </span></a> </li>
                            <li> <a href="{{url('/student/change-password')}}"><i class="fa fa-key"></i>Change Password<span> </span></a> </li>
                            <li> <a href="{{url('/student/logout')}}"><i class="fa fa-sign-out"></i>Logout<span> </span></a> </li>
                        </ul>
                    </section>
                </aside>
            </div>
            @yield('side-bar')
        </div>
    </div>
</section>
<!-- End Blog Details Area -->