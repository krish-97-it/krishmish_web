<?php
    /*
     Template Name: Home Page
     Author: Krishnendu
    */

    $base_url				=	baseUrl();
    get_header(); 
?>
    <main id="main-content">
        <div class="container-fluid home-custom-container" style="margin-top:50px;">
            <div class="row custom-row-style">
                <div id="myCarousel" class="col-md-12 carousel slide homepage-banner-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner home-carousel-inner">
                        <div class="item active">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-seven.jpg" alt="drinks" height="auto" width="100%">
                        </div>
                        <div class="item">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-six.jpg" alt="Starter-pack" height="auto" width="100%">
                        </div>
                        <div class="item">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-chinese.jpg" alt="chinese-cusine" height="auto" width="100%">
                        </div>
                        <div class="item">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-five.jpg" alt="Indian-xusine" height="auto" width="100%">
                        </div>
                        <div class="item">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-two.jpg" alt="South-indian" height="auto" width="100%">
                        </div>
                        <div class="item">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/food-banner-five.png" alt="icecream-desert" height="auto" width="100%">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div>
                <div class="col-md-12 col-padding-style home-page-intro-para-section">
                    <div class="intro-para-cover">
                        <div class="introduction-para">
                            <p class="blink-heading">Hello User !!</h3>
                            <p class="check-order-menu-txt">Welcome to KrishMish, a house of tasty, fresh and affordable combos of food. We provide Indian, Chinese, Korean multi-cusine. Check and Order your favourite dishes right now.</p>
                        </div>
                        <div class="check-order-section">
                            <div class="intro-para-img-section">
                                <img class="lets_eat_gif" src="<?php echo get_template_directory_uri() ?>/assets/gifs/lets_eat.gif" alt="lets_eat" height="auto" width="auto"/>
                            </div>
                            <div class="order-now-btn-section">
                                <div class="homepage-order-now-btn">
                                    <a href="" class="btn check-order-now-btn">Check And Order Now</a>
                                </div>
                                <p class="first-order-offer-txt">*30% Off on your First Order*</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-padding-style our-service-section">
                    <h3 class="related-blog-h"><span class="glyphicon glyphicon-tower custom-glyphicon-icon"></span><b> Our Services </b><span class="glyphicon glyphicon-tower custom-glyphicon-icon"></span></h3>
                    <div class="row blog-card-row service-section-row">
                        <div class="col-sm-4 flip-box-card flip-box-card-m25">
                            <div class="custom-flip-box">
                                <div class="custom-flip-box-inner">
                                    <div class="custom-flip-box-front card-logo">
                                        <img src="/wp-content/uploads/2024/05/restaurant_background_fast_food_logo.webp" class="flip-card-img" alt="">
                                        <h4 class="card-heading">Resturant</h4>
                                    </div>
                                    <div class="custom-flip-box-back card-body service-section-card">
                                        <p class="card-desc">The love we are getting from our customers is increasing day by day, We are happy to serve our delicious dishes from our all three oulets across two cities.</p>
                                        <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 flip-box-card flip-box-card-m25">
                            <div class="custom-flip-box">
                                <div class="custom-flip-box-inner">
                                    <div class="custom-flip-box-front card-logo">
                                        <img src="/wp-content/uploads/2024/05/home_delivery_image.webp" class="flip-card-img" alt="">
                                        <h4 class="card-heading">Home Delivery</h4>
                                    </div>
                                    <div class="custom-flip-box-back card-body service-section-card">
                                        <p class="card-desc">The love we are getting from our customers is increasing day by day, We are happy to serve our delicious dishes from our all three oulets across two cities.</p>
                                        <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 flip-box-card">
                            <div class="custom-flip-box">
                                <div class="custom-flip-box-inner">
                                    <div class="custom-flip-box-front card-logo">
                                        <img src="/wp-content/uploads/2024/05/catering_service_image_logo.webp" class="flip-card-img" alt="">
                                        <h4 class="card-heading">Cattering</h4>
                                    </div>
                                    <div class="custom-flip-box-back card-body service-section-card">
                                        <p class="card-desc">The love we are getting from our customers is increasing day by day, We are happy to serve our delicious dishes from our all three oulets across two cities.</p>
                                        <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-padding-style  content-banner-section hidden-on-mob">
                    <div class="row content-banner-row">
                        <div class="col-sm-6 home-content-banner home-promo-banner-two-desktop">
                            <a class="home-korean-banner-redirection" banner-href="" onclick="window?.dataLayer?.push({event: 'home_ko_banner_view', url: window.location.href }); ">
                                <picture>
                                    <source media="(max-width: 449.98px)" srcset="<?=get_template_directory_uri();?>/assets/images/korean_food_banner.webp"/>
                                    <source media="(min-width: 450px)" srcset="<?=get_template_directory_uri();?>/assets/images/korean_food_banner_desktop.webp"/>
                                    <img class="banner-custom-css" src="<?=get_template_directory_uri();?>/assets/images/korean_food_banner.webp" alt="Learn With Math Companion" height="auto" width="100%" style="width:100% !important; border-radius: 16px; box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);">
                                </picture>
                            </a>
                        </div>
                        <div class="col-sm-6 home-content-banner home-promo-banner-one-desktop">
                            <a class="happy-hours-banner-redirection" banner-href="" onclick="window?.dataLayer?.push({event: 'home_ko_banner_view', url: window.location.href }); ">
                                <img class="banner-custom-css" src="<?=get_template_directory_uri();?>/assets/images/happy_hours_banner.webp" alt="Learn With Math Companion" height="auto" width="100%" style="width:100% !important; border-radius: 16px; box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);">
                            </a>
                        </div>
                    </div>
                </div>
                <?php require 'components/carousel/review-carousel.php'; ?>
                <div class="col-md-12 col-padding-style  content-banner-section hidden-on-desktop">
                    <div class="row content-banner-row">
                        <div class="col-sm-12 home-content-banner home-promo-banner-one-desktop">
                            <a class="happy-hours-banner-redirection" banner-href="" onclick="window?.dataLayer?.push({event: 'home_ko_banner_view', url: window.location.href }); ">
                                <img class="banner-custom-css" src="<?=get_template_directory_uri();?>/assets/images/happy_hours_banner.webp" alt="Learn With Math Companion" height="auto" width="100%" style="width:100% !important; border-radius: 16px; box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-padding-style km-food-gallery">
                    <h3 class="related-blog-h"><span class="glyphicon glyphicon-star custom-glyphicon-icon"></span><b> Beauty Of Food </b><span class="glyphicon glyphicon-star custom-glyphicon-icon"></span></h3>
                    <div class="row blog-card-row">
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png"  class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Beauty Of Food</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png" class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Budget Bites</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png" class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Budget Bites</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-padding-style  content-banner-section hidden-on-desktop">
                    <div class="row content-banner-row">
                        <div class="col-sm-12 home-content-banner home-promo-banner-two">
                            <a class="home-korean-banner-redirection" banner-href="" onclick="window?.dataLayer?.push({event: 'home_ko_banner_view', url: window.location.href }); ">
                                <picture>
                                    <source media="(max-width: 449.98px)" srcset="<?=get_template_directory_uri();?>/assets/images/korean_food_banner.webp"/>
                                    <source media="(min-width: 450px)" srcset="<?=get_template_directory_uri();?>/assets/images/korean_food_banner_desktop.webp"/>
                                    <img class="banner-custom-css" src="<?=get_template_directory_uri();?>/assets/images/korean_food_banner.webp" alt="Learn With Math Companion" height="auto" width="100%" style="width:100% !important; border-radius: 16px; box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-padding-style related-blog-section">
                    <h3 class="related-blog-h"><span class="glyphicon glyphicon-tower custom-glyphicon-icon"></span><b> Related Blogs </b><span class="glyphicon glyphicon-tower custom-glyphicon-icon"></span></h3>
                    <div class="row blog-card-row">
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png"  class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Budget Bites</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png" class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Budget Bites</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                        <div class="col-sm-4 blog-card">
                            <img src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Budget-Bites-image-e1689849028294.png" class="card-img" alt="">
                            <div class="card-body">
                                <h4 class="card-heading">Budget Bites</h4>
                                <p class="card-desc">If you are a person with a busy schedule and do not have much time for snacking, then combo meals are beneficial for you. At an affordable rates, you will get enough quality food to satisfy your hunger and at the same time, you can save time by not consuming the time to decide on a menu.</p>
                                <a href="http://localwww.krishmish.com/budget-bites/" class="read-more-txt">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
