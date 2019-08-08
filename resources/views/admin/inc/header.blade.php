<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="images/img.jpg" alt="">Admin
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('admin.profile')}}"> Profile</a></li>
                        <li><a href="{{route('AdminLogout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="info-number">
                        <div class="form-group pull-right top_search" style="width: 230px">
                            <div class="input-group">
                                <input type="text" class="form-control search" placeholder="Tracking No...">
                                <span class="input-group-btn search-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

