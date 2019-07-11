<!--================================
    START SLIDER AREA
=================================-->
<section class="breadcrumb reveal animated" data-delay="0.2s" data-anim="fadeInUpShort" style="height: 157px">

    <div class="breadcrumb_content" style="padding-top: 87px">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-12 starts -->
                <div class="col-md-12">
                    <div class="breadcrumb_title_wrapper">
                        <div class="page_title">
                            <h1 style="font-size: 20px">{{$title}}</h1>
                        </div>
                        <ul class="bread_crumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="bread_active">{{$title}}</li>
                        </ul>
                    </div>
                </div><!-- col-md-12 ends -->
            </div>
            <!-- /.row ends -->
        </div><!-- /.container ends -->
    </div>

    <!-- menu starts -->
    <div class="menu_area">

        <!-- container starts -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="mainmenu nav_shadow">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                           @include('inc.menubar')
                        </nav>
                    </div><!-- main menu ends -->
                </div>
            </div><!-- /.row end -->

        </div><!-- /.container ends -->
    </div><!-- menu ends -->
</section>
<!--================================
    END SLIDER AREA
=================================-->