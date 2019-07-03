<!--================================
       START FOOTER
   =================================-->
<footer>
    <div class="big_footer_wrapper section_padding">
        <div class="container">
            <div class="row">

                <div class="col-md-3 xxs_fullwidth col-xs-6">
                    <div class="footer_about_wrapper reveal animated" data-anim="fadeInLeftShort">
                        <div class="footer_logo">
                            <a href="index.html">
                                <img src="images/footer_logo.png" alt="footer_logo">
                            </a>
                        </div>
                        <div class="footer_about_us">
                            <p>Nam liber tempor cum soluta nobis eleend option congue nihil imperdiet doming id quod
                                mazim placerat </p>
                        </div>
                        <div class="footer_social">
                            <h4>get connected</h4>
                            <ul>
                                <li><a href="{{basic_information()->facebook_link}}"><span
                                                class="fa fa-facebook"></span></a></li>
                                <li><a href="{{basic_information()->twiter_link}}"><span
                                                class="fa fa-twitter"></span></a></li>
                                <li><a href="{{basic_information()->pinterest_link}}"><span
                                                class="fa fa-pinterest-p"></span></a></li>
                                <li><a href="{{basic_information()->linkedin}}"><span class="fa fa-linkedin"></span></a>
                                </li>
                                <li><a href="{{basic_information()->google_plus_link}}"><span
                                                class="fa fa-google-plus"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 xxs_fullwidth col-xs-6">
                    <div class="footer_widgets sevices reveal animated" data-anim="fadeInRightShort"
                         data-delay="0.2s">
                        <div class="widget_title">
                            <h4>our services</h4>
                        </div>
                        <div class="footer_links">
                            <ul>
                                @foreach(service() as $services)
                                    <li><a href="#">{{$services->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 xxs_fullwidth col-xs-6">
                    <div class="footer_widgets contact reveal animated" data-anim="fadeInRightShort"
                         data-delay="0.4s">
                        <div class="widget_title">
                            <h4>contatc us</h4>
                        </div>
                        <div class="footer_address">
                            <ul>
                                <li><span class="fa fa-paper-plane-o"></span>
                                    <div class="address_right">{{basic_information()->address}}</div>
                                </li>
                                <li>
                                    <span class="fa fa-phone"></span>
                                    <div class="number address_right">
                                        <a href="tel:{{basic_information()->phone_number_one}}">{{basic_information()->phone_number_one}}</a>
                                        <a href="tel:{{basic_information()->phone_number_two}}">{{basic_information()->phone_number_two}}</a>
                                    </div>
                                </li>
                                <li>
                                    <span class="fa fa-envelope-o"></span>
                                    <div class="address_right">
                                        <a href="mailto:{{basic_information()->email}}">{{basic_information()->email}}</a>
                                        <a href="{{basic_information()->website_link}}">{{basic_information()->website_link}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 xxs_fullwidth col-xs-6">
                    <div class="footer_widgets twitter reveal animated" data-anim="fadeInRightShort"
                         data-delay="0.6s">
                        <div class="widget_title">
                            <h4>contatc us</h4>
                        </div>

                        <div class="twitter_widget">
                            <div class="single_tweets">
                                <span class="twit_icon fa fa-twitter"></span>
                                <div class="twit">
                                    <p><span class="tag">@FINE</span> courier Completely synergize resource
                                        sucking relationships theme is good</p>
                                    <span class="time">3 minutes ago</span>
                                </div>
                            </div>
                            <div class="single_tweets">
                                <span class="twit_icon fa fa-twitter"></span>
                                <div class="twit">
                                    <p><span class="tag">@FINE</span> courier Completely synergize resource
                                        sucking relationships theme is good</p>
                                    <span class="time">3 minutes ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="tiny_footer">
        <div class="container">
            <div class="col-md-6 xs_fullwidth col-xs-6">
                <div class="footer_text_wrapper">
                    <p class="footer_text">{{basic_information()->footer_text}} <a
                                href="{{basic_information()->website_link}}">{{basic_information()->company_name}}</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 xs_fullwidth col-xs-6">
                <div class="footer_menu clearfix">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about_us')}}">About Us</a></li>
                        <li><a href="{{route('track_trace')}}">Track & Trace</a></li>
                        <li><a href="{{route('news')}}">News</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================================
    END FOOTER
=================================-->