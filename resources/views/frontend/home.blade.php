


@extends('frontend.master')

@section('footer')
<footer class="footer-area">
    <!--== Start Footer Top ==-->
    <div class="footer-top">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-lg-5">
            <div class="footer-newsletter-content">
              <h4 class="title">Subscribe for everyday job newsletter.</h4>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="footer-newsletter-form">
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button type="submit" class="btn-newsletter">Subscribe Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Top ==-->

    <!--== Start Footer Main ==-->
    <div class="footer-main">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="widget-item widget-about">
              <div class="widget-logo-area">
                <a href="index.html">
                  <img class="logo-main" src="assets/img/logo-light-theme.png" alt="Logo" />
                </a>
              </div>
              <p class="desc">That necessitat ecommerce platform that optimi your store popularised the release</p>
              <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item1">
                  <h4 class="widget-title">Company</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-1">Company</h4>
                  <div id="widgetId-1" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="about-us.html">About Us</a></li>
                          <li><a href="about-us.html">Why Extobot</a></li>
                          <li><a href="contact.html">Contact With Us</a></li>
                          <li><a href="contact.html">Our Partners</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item2">
                  <h4 class="widget-title">Resources</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-2">Resources</h4>
                  <div id="widgetId-2" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-login.html">Quick Links</a></li>
                          <li><a href="job.html">Job Packages</a></li>
                          <li><a href="job.html">Post New Job</a></li>
                          <li><a href="job.html">Jobs Listing</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item3">
                  <h4 class="widget-title">Legal</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-3">Legal</h4>
                  <div id="widgetId-3" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-login.html">Affiliate</a></li>
                          <li><a href="blog.html">Blog</a></li>
                          <li><a href="account-login.html">Help & Support</a></li>
                          <li><a href="job.html">Careers</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item4">
                  <h4 class="widget-title">Products</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-4">Products</h4>
                  <div id="widgetId-4" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-login.html">Star a Trial</a></li>
                          <li><a href="about-us.html">How It Works</a></li>
                          <li><a href="account-login.html">Features</a></li>
                          <li><a href="about-us.html">Price & Planing</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="footer-bottom-content">
              <p class="copyright">© 2021 Finate. Made with <i class="icofont-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom ==-->
  </footer>
@endsection