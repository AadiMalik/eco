<?php
$media = media();
$data = content();
?>
<!-- footer area start-->
<div class="footer-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="single-footer contact-us">
                    <div class="footer-title uppercase">
                        <h5>{{$data['#footercontact']['heading']}}</h5>
                    </div>
                    <ul>
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#location']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p>{!!$data['#location']['description']!!}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#email']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p><span><a href="mailto://{!!$data['#email']['description']!!}">{!!$data['#email']['description']!!}</a></span></p>
                            </div>
                        </li><br>
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#phone']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p><a href="tel://{!!$data['#phone']['description']!!}">{!!$data['#phone']['description']!!}</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single-footer informaton-area">
                    <div class="footer-title uppercase">
                        <h5>{{$data['#footerlink']['heading']}}</h5>
                    </div>
                    <div class="informatoin">
                        <ul>
                            <li><a href="{{url('payment')}}">Payments</a></li>
                            <li><a href="{{url('about')}}">About Us</a></li>
                            <li><a href="{{url('shop')}}">Shop Now</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('term')}}">Private Policy</a></li>
                            <li><a href="{{url('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single-footer newslatter-area">
                    <div class="footer-title uppercase">
                        <h5>{{$data['#footernewsletter']['heading']}}</h5>
                    </div>
                    <div class="newslatter">
                        <form action="#" method="post">
                            <div class="input-box pos-rltv">
                                <input placeholder="Type Your Email hear" type="text">
                                <a href="#">
                                    <i class="zmdi zmdi-arrow-right"></i>
                                </a>
                            </div>
                        </form>
                        <div class="social-icon socile-icon-style-3 mt-40">
                            <div class="footer-title uppercase">
                                <h5>{{$data['#fallowus']['heading']}}</h5>
                            </div>
                            <ul>
                                @foreach ($media as $item)
                                <li><a href="{{$item->link}}"><i class="{{$item->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer area start-->

<!--footer bottom area start-->
<div class="footer-bottom global-table">
    <div class="global-row">
        <div class="global-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyrigth">
                            <p>
                                Copyright &copy; <?php echo date("Y"); ?> <span class="text-uppercase">{{$data['#logo']['heading']}}</span>. Made
                                with <i style="color:#f53400;" class="fa fa-heart"></i> by
                                <a target="_blank" href="https://www.redbrickssolution.com">Red Bricks Solution</a>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <ul class="payment-support text-right">
                            <li>
                                <a href="#"><img src="images/icons/pay1.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/icons/pay2.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/icons/pay3.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/icons/pay4.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/icons/pay5.png" alt="" /></a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer bottom area end-->