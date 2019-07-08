@extends('layout.app')
@section('content')

    @include('inc.slide_area')


    <!--================================
    START LOGIN AREA
=================================-->
    <section class="login_area reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                @include('inc.sidebar')
                <div class="col-sm-8 col-md-9">
                    @yield('content2')
                </div>

            </div>
        </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END LOGIN AREA
    =================================-->





@endsection