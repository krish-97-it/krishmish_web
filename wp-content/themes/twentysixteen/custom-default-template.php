<?php
    /*
     Template Name: Custom Default Template
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
        
        <!-- header and footer custom css file include-->
        <link rel="stylesheet" href="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/css/custom-css/custom-header.css">
        <link rel="stylesheet" href="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/css/custom-css/custom-footer.css">
        
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
        <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
        <?php 
        // get_header('custom');
            get_header();
        ?>
        
        <main>
            <div class="container-fluid" style="margin-top:50px">
                <div class="row" id="main-content">
                    <?php
                        the_content();
                    ?> 
                </div>
            </div>
        </main>

        <?php 
        // get_footer('custom');
        get_footer(); ?>
    <body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/js/custom-js/home-page.js"></script>
<script type="text/javascript" src="http://localhost/wordpress-basics-learning/wp-content/themes/twentysixteen/js/custom-js/custom-header-footer.js"></script>