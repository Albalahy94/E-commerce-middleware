	<!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{__('store.About Us')}}</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>{{__('store.Egypt')}}</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>010-6748-1567</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> sh.elbalahy@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{__('store.Categories')}}</h3>
                            <ul class="footer-links">
                                <li><a href="#">{{__('store.Hot deals')}}</a></li>
                                <li><a href="#">{{__('store.Laptops')}}</a></li>
                                <li><a href="#">{{__('store.Smartphones')}}</a></li>
                                {{-- <li><a href="#">Cameras</a></li> --}}
                                <li><a href="#">{{__('store.Accessories')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{__('store.Information')}}</h3>
                            <ul class="footer-links">
                                <li><a href="#">{{__('store.About Us')}}</a></li>
                                <li><a href="#">{{__('store.Contact Us')}}</a></li>
                                <li><a href="#">{{__('store.Privacy Policy')}}</a></li>
                                <li><a href="#">{{__('store.Orders and Returns')}}</a></li>
                                <li><a href="#">{{__('store.Terms & Conditions')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{__('store.Service')}}</h3>
                            <ul class="footer-links">
                                <li><a href="#">{{__('store.My Account')}}</a></li>
                                <li><a href="#">{{__('store.View Cart')}}</a></li>
                                <li><a href="#">{{__('store.Wishlist')}}</a></li>
                                <li><a href="#">{{__('store.Track My Order')}}</a></li>
                                <li><a href="#">{{__('store.Help')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        @auth
                            
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        @endauth
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            {{__('store.Copyright')}} &copy;<script>document.write(new Date().getFullYear());</script> {{__('store.All rights reserved | This template is made with')}} <i class="fa fa-heart-o" aria-hidden="true"></i> {{__('store.by')}} <a href="#" target="_blank">Said Albalahy</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                    <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
