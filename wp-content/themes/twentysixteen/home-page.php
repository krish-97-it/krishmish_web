<?php
    /*
     Template Name: Home Page
     Author: Krishnendu
    */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- font family load -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        
        <!-- home page custom css file include-->
        <link rel="stylesheet" href="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/css/custom-css/custom-header.css">
        <link rel="stylesheet" href="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/css/custom-css/custom-footer.css">
        <link rel="stylesheet" href="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/css/custom-css/home-page.css">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
        <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
        <?php get_header('custom') ?>
        <main id="main-content">
            <div class="container-fluid" style="margin-top:50px">
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
                        <div class="carousel-inner">
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
                    <div class="col-md-12 body-bg-image-home">
                        <h3 class="blink-heading ">Hello User !!</h3>
                        <div class="introduction-para">
                            <p>
                                Welcome to KrishMish, a house of tasty, fresh and affordable combos of food. We provide Indian, Chinese, Korean multi-cusine. Ok Oook! enough introduction for now, Are you hungry? Don't worry KrishMish is here and your Food is waiting for you.
                            </p>
                            <div class="menu-card-link">
                                <h5 class="multi-cuisine-txt">Visit Our Multi-Cuisine <span class="glyphicon glyphicon glyphicon-link glyphicon-hand-down custom-glyphicon"></span></h5>
                                <a href="#" class="btn go-to-indian-cuisine menu-redirect-btn">
                                    <span class="glyphicon glyphicon-hand-right custom-glyphicon-menu"></span>&nbsp; Indian Cuisine&nbsp;
                                </a><br>
                                <a href="#" class="btn go-to-chinese-cuisine menu-redirect-btn">
                                    <span class="glyphicon glyphicon-hand-right custom-glyphicon-menu"></span>&nbsp; Chinese Cuisine
                                </a><br>
                                <a href="#" class="btn go-to-korean-cuisine menu-redirect-btn">
                                    <span class="glyphicon glyphicon-hand-right custom-glyphicon-menu"></span>&nbsp; Korean Cuisine
                                </a><br>
                                <!-- <a href="#">
                                    <img class="menu-logo" src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/Menu-card-icon-two-e1689834287835.png" alt="menu-card-icon" height="auto" width="50%">
                                </a> -->
                            </div>
                            
                            <svg viewBox='0 0 200 200' width='200' height='200' xmlns='http://www.w3.org/2000/svg' class="link__svg" aria-labelledby="link2-title link2-desc">
                                <title id="link2-title">You are wonderful, now click this</title>
                                <desc id="link2-desc">A rotating link with text placed around a circle, with a cloud/flower shape around it, and a smiley face inside</desc>

                                <path id="link-circle-alt" class="link__path" d="M 35, 100 a 65,65 0 1,1 130,0 a 65,65 0 1,1 -130,0" stroke="none" fill="none" />

                                <path class="link__cloud" d="M88.964,9.111C89.997,4.612 94.586,0.999 100,0.999C105.413,0.999 110.002,4.612 111.036,9.111C113.115,4.991 118.435,2.581 123.692,3.878C128.948,5.172 132.54,9.78 132.466,14.393C135.472,10.891 141.214,9.824 146.008,12.341C150.801,14.855 153.185,20.189 152.01,24.651C155.766,21.968 161.597,22.307 165.648,25.899C169.7,29.488 170.741,35.235 168.53,39.286C172.818,37.583 178.4,39.307 181.474,43.761C184.551,48.217 184.183,54.047 181.068,57.451C185.641,56.823 190.646,59.834 192.567,64.894C194.486,69.955 192.735,75.529 188.895,78.09C193.486,78.573 197.626,82.693 198.278,88.067C198.93,93.441 195.898,98.433 191.556,100C195.898,101.567 198.93,106.56 198.278,111.934C197.626,117.307 193.486,121.427 188.895,121.91C192.735,124.472 194.486,130.045 192.567,135.106C190.646,140.167 185.641,143.177 181.068,142.549C184.183,145.954 184.551,151.783 181.474,156.239C178.4,160.693 172.818,162.418 168.53,160.712C170.741,164.766 169.7,170.512 165.648,174.102C161.597,177.691 155.766,178.032 152.01,175.349C153.185,179.812 150.801,185.145 146.008,187.66C141.214,190.176 135.472,189.109 132.466,185.607C132.54,190.221 128.948,194.828 123.692,196.123C118.435,197.419 113.115,195.009 111.036,190.889C110.002,195.388 105.413,199.001 100,199.001C94.586,199.001 89.997,195.388 88.964,190.889C86.884,195.009 81.564,197.419 76.307,196.123C71.051,194.828 67.461,190.221 67.533,185.607C64.529,189.109 58.785,190.176 53.992,187.66C49.2,185.145 46.815,179.812 47.989,175.349C44.233,178.032 38.402,177.691 34.351,174.102C30.299,170.512 29.259,164.766 31.469,160.712C27.181,162.418 21.599,160.693 18.525,156.239C15.449,151.783 15.816,145.954 18.931,142.549C14.359,143.177 9.353,140.167 7.434,135.106C5.513,130.045 7.264,124.472 11.104,121.91C6.514,121.427 2.374,117.307 1.722,111.934C1.07,106.56 4.103,101.567 8.443,100C4.103,98.433 1.07,93.441 1.722,88.067C2.374,82.693 6.514,78.573 11.104,78.09C7.264,75.529 5.513,69.955 7.434,64.894C9.353,59.834 14.359,56.823 18.931,57.451C15.816,54.047 15.449,48.217 18.525,43.761C21.599,39.307 27.181,37.583 31.469,39.286C29.259,35.235 30.299,29.488 34.351,25.899C38.402,22.307 44.233,21.968 47.989,24.651C46.815,20.189 49.2,14.855 53.992,12.341C58.785,9.824 64.529,10.891 67.533,14.393C67.461,9.78 71.051,5.172 76.307,3.878C81.564,2.581 86.884,4.991 88.964,9.111Z" fill="none" />

                                <g class="link__face">
                                    <path d='M 95 102 Q 100 107 105 102' fill="none" />
                                    <ellipse class='' cx='90' cy='100' rx='2' ry='2' stroke="none" />
                                    <ellipse class='' cx='110' cy='100' rx='2' ry='2' stroke="none" />
                                    <ellipse class='' cx='100' cy='100' rx='35' ry='35' fill="none" />
                                </g>

                                <text class="link__text">
                                    <textPath href="#link-circle-alt" stroke="none">
                                    -- •-- Your Table Is Ready! -- • -- Go For A Cuisine
                                    </textPath>
                                </text>
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-12 related-blog-section special-Combos-section">
                        <h3 class="related-blog-h"><span class="glyphicon glyphicon-star custom-glyphicon-icon"></span><b> Special Combos </b><span class="glyphicon glyphicon-star custom-glyphicon-icon"></span></h3>
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

                    <div class="col-md-12 related-blog-section krishmish-special">
                        <h3 class="related-blog-h"><span class="glyphicon glyphicon-heart custom-glyphicon-icon"></span><b> KrishMish Special </b><span class="glyphicon glyphicon-heart custom-glyphicon-icon"></span></h3>
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
                    <div class="col-md-12 related-blog-section">
                        <h3 class="related-blog-h">Related Blogs</h3>
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
        <?php get_footer('custom'); ?>
    <body>
</html>

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/js/custom-js/home-page.js"></script>
<script type="text/javascript" src="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/js/custom-js/custom-header-footer.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>