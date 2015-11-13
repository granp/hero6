                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">ATLANT</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ Auth::user()->name }}</div>
                                <!-- <div class="profile-data-title">Web Developer/Designer</div> -->
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="{{ URL::route('dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>
                    <li class=" ">
                        <a href="{{ URL::route('book') }}"><span class="fa fa-book"></span> <span class="xn-text">Book</span></a>
                    </li>
                    <li class=" ">
                        <a href="{{ URL::route('route') }}"><span class="glyphicon glyphicon-road"></span> <span class="xn-text">Routes</span></a>
                    </li>
                    <li class=" ">
                        <a href="{{ URL::route('buses') }}"><span class="glyphicon glyphicon-map-marker"></span> <span class="xn-text">Bus Type</span></a>
                    </li>
                    <li class=" ">
                        <a href="#"><span class="fa fa-calendar"></span> <span class="xn-text">Calendar</span></a>
                    </li>
                    <li class=" ">
                        <a href="{{ URL::route('editprofile') }}"><span class="fa fa-user"></span><span class="xn-text">Profile</span></a>
                    </li>                   
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>
                            <li><a href="pages-invoice.html"><span class="fa fa-dollar"></span> Invoice</a></li>
                            <li><a href="pages-edit-profile.html"><span class="fa fa-wrench"></span> Edit Profile</a></li>
                            <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>
                            <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                                <ul>
                                    <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                                    <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                                <ul>
                                    <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                                    <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                                    <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                            <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                            <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                            <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                            <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                            <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-file"></span> Blog</a>
                                
                                <ul>                                    
                                    <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                                    <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                                <ul>                                                                        
                                    <li><a href="pages-login.html">Login v1</a></li>
                                    <li><a href="pages-login-v2.html">Login v2</a></li>
                                    <li><a href="pages-login-inside.html">Login v2 Inside</a></li>
                                    <li><a href="pages-login-website.html">Website Login</a></li>
                                    <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-plus"></span> Registration</a><div class="informer informer-danger">New!</div>
                                <ul>                                                                        
                                    <li><a href="pages-registration.html">Default</a></li>
                                    <li><a href="pages-registration-login.html">With Login</a></li>                                    
                                </ul>
                            </li>
                            <li><a href="pages-forgot-password.html"><span class="fa fa-question"></span> Forgot Password</a><div class="informer informer-danger">New!</div></li>                            
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                                <ul>                                    
                                    <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                                    <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                                    <li><a href="pages-error-500.html"> Error 500</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Root</span></a>
                        <ul>
                            <li><a href="{{ URL::route('inviteClient') }}"><span class="fa fa-image"></span>Invite Client</a></li>
                            <li><a href="{{ URL::route('addcity') }}"><span class="fa fa-dollar"></span>Add City</a></li>
                            <li><a href="#"><span class="fa fa-dollar"></span>New User</a></li>
                            <li><a href="#"><span class="fa fa-wrench"></span>Profile</a></li>
                            <li><a href="#"><span class="fa fa-user"></span>Reports</a></li>                         
                        </ul>
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->