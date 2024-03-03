<?php
    global $post;
    $current_page_url       =   getCurrentPageurl(1,1);
    $slug_name              =   trim(parse_url($current_page_url, PHP_URL_PATH),'/');
    $post_id                =   (isset($post->ID)) ? $post->ID : 0;
    $get_file_directory     =   get_stylesheet_directory_uri();
    $feature_img            =   getPostFeaturedImage($post_id); 
    $content                =   get_the_excerpt($post_id);
    $seo_content            =   get_custom_seo_content($post_id);
    $custom_meta_title      =   $seo_content['meta_title'] ? $seo_content['meta_title'] : '';
    $custom_meta_desc       =   $seo_content['meta_description'] ? $seo_content['meta_description'] : '';
    $title                  =   '';
    $meta_image             =   '';
    $meta_type              =   '';
    $meta_description       =   '';
    $version                =   '2.0';
    $ipdat                  =   @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    $country_name           =   $ipdat->geoplugin_countryName;
    $user_country_code      =   $ipdat->geoplugin_countryCode;
    $schema_type            =   '';

    $country_code           =   '';
    if($country_code == 'UK' || $country_code == 'GB'){
        $logo_href      =   "https://byjus.com/uk/math/";
        $country        =   "uk";
        $data_href      =   "https://byjus.com/uk/math/?device=device_type&utm_source=UK_Home&utm_medium=top_navbar&utm_campaign=beyond_tutoring_bmc&utm_term=".urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    }else if($country_code == 'AU' || $country_code == 'NZ'){
        $logo_href      =   "https://byjus.com/au/math/";
        $country        =   "au";
        $data_href      =   "https://byjus.com/au/math/?device=device_type&utm_source=AU_Home&utm_medium=top_navbar&utm_campaign=beyond_tutoring_bmc&utm_term=".urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    }else{
        $logo_href      =   "https://byjus.com/us/math/";
        $country        =   "us";
        $data_href      =   "https://byjus.com/us/math/?device=device_type&utm_source=bmc_blog&utm_medium=top_navbar&utm_campaign=beyond_tutoring_bmc&utm_term=".urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <meta name="robots" content="index,follow">
        <meta name="google-site-verification" content="BLexjMmeePrgGghWSA1_6nK0gw4nqPzbtGz2ah6-2-c">

        <?php
            if(have_posts() && is_category()){
                $category               =   get_category(get_query_var('cat'));
                $title                  =   get_cat_name($category->cat_ID);
                $meta_type              =   "category";
                if($title == 'Tutoring'){
                    $meta_image         =   'https://math-media.byjusfutureschool.com/bfs-math/2023/09/14213748/tutoring.webp';
                }else if($title == 'Math Fun'){
                    $meta_image         =   'https://math-media.byjusfutureschool.com/bfs-math/2023/09/14213738/math_fun.webp';
                }else if($title == 'For Parents'){
                    $meta_image         =   'https://math-media.byjusfutureschool.com/bfs-math/2023/10/13214134/for_parents.webp';
                }else if($title == 'Real World Maths'){
                    $meta_image         =   'https://math-media.byjusfutureschool.com/bfs-math/2023/10/13214138/math_real_world.webp';
                }
                $schema_type            =   'Category';
                $schema_id              =   $category->cat_ID;
            }else if(is_single()){
                $title                  =   get_the_title();
                $meta_type              =   "article";
                $meta_description       =   (esc_attr($content));
                $meta_image             =   $feature_img;
                $schema_type            =   'Article';
                $schema_id              =   $post_id;
            }else if(is_page()){
                $title                  =   "Blog Home | Byju's Math";
                $meta_type              =   "Blog Home";
                $meta_description       =   "Byju's Math Companion Blog website acts as a information guide for both parents &amp; kids who wants to know more tips and interesting thoughts related to Math. Mainly we have these categories - Tutoring, For Parents, Math Fun, Real World Maths";
                $meta_image             =   $feature_img;
            }
        ?>
        <title><?=$title;?></title>
        <?php if($custom_meta_desc != ''){ ?>
            <meta name="description" content="<?=$custom_meta_desc?>" />
        <?php }else if($meta_description){ ?>
            <meta name="description" content="<?=$meta_description?>" />
        <?php }else { ?>
            <meta name="description" content="<?=$post->post_title?>"/>
        <?php } ?>

        <!-- Open Graph Tags -->
        <?php if($custom_meta_title != ''){ ?>
            <meta property="og:title" content="<?= $custom_meta_title?>"/>
        <?php }else if($title != ''){ ?>
            <meta property="og:title" content="<?= str_replace('\\', '', $title) ?>"/>
        <?php } else{ ?>
            <meta property="og:title" content="<?=str_replace('\\','',($post->post_title))?>"/>
        <?php } ?>

        <?php if($meta_type != '') { ?>
            <meta property="og:type" content="<?= $meta_type ?>"/>
        <?php }else{ ?>
            <meta property="og:type" content="article"/>
        <?php } ?>

        <?php if($current_page_url != ''){ ?>
            <meta property="og:url" content="<?= $current_page_url ?>"/>
        <?php } ?>

        <?php if($meta_type != '' && $meta_image != ''){ ?>
            <meta property="og:image" content="<?=$meta_image ?>"/>
        <?php } ?>

        <?php if($custom_meta_desc != ''){ ?>
            <meta property="og:description" content="<?=$custom_meta_desc?>"/>
        <?php }else if($meta_description != '') { ?>
            <meta property="og:description" content="<?=$meta_description?>"/>
        <?php } else{ ?>
            <meta property="og:description" content="<?=$post->post_title?>"/>
        <?php } ?>

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="icon" href="https://cdn1.byjus.com/blog/2018/03/15174826/favicon.png" sizes="32x32" />
        <link rel="icon" href="https://cdn1.byjus.com/blog/2018/03/15174826/favicon.png" sizes="192x192" />
        <link rel="canonical" href="<?=$current_page_url?>"/>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- font family load -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

        <?php wp_head() ?>
        
        <!-- Adding GTM Script -->
        <!-- <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-PD6JDHC"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'GTM-PD6JDHC');
        </script> -->
       
        <?php 
            if($schema_type !='' && ($schema_type == 'Article' || $schema_type == 'Category')){
                // Article Schema by custom code without plugins
                getArticleSchema($post_id, $schema_type);

                // Breadcrumb Schema by custom code without plugins
                getBreadcrumbSchema($schema_id, $schema_type);
            }

            // FAQ Schema
            if($schema_type !='' && $schema_type == 'Article'){
                // getFAQSchema($schema_id);
            }

            // Search/Info Schema for all pages
            getGeneralInfoSchema();
        ?>

    </head>
    <body <?php body_class(); ?>>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://localhost/wordpress-basics-learning/">
						<img alt="Brand" src="http://localhost/wordpress-basics-learning/wp-content/uploads/2023/07/shop-logo-one-1-e1689796889309.jpg" height="50px" width="50px">
					</a>
					<div class="nav-mob-title">KrishMish</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class=""><a href="http://localwww.krishmish.com/">Home</a></li>
					<li><a href="/menu-card/">Menu Card</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/resturant/">Resturant & Cafe</a></li>
							<li><a href="/Cattering/">Cattering</a></li>
							<li><a href="/home-delivery/">Home Delivery</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exclusive<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Blogs</a></li>
							<li><a href="#">Gallery</a></li>
							<li><a href="#">Reviews</a></li>
							<li><a href="#">FAQ</a></li>
							<li role="separator" class="divider"></li>
							<!-- <li class="dropdown-header">Other</li> -->
							<li class="dropdown-submenu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
								<ul class="dropdown-menu">
									<li><a href="#">Our Journey</a></li>
									<li><a href="#">Our Partners</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Join Us</a>
								<ul class="dropdown-menu">
									<li><a href="#">Carrer</a></li>
									<li><a href="#">Buisness</a></li>
									<li><a href="#">Donate A Meal</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="http://localwww.krishmish.com/contact-us/">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right dynamic-navbar-right-data">
					<!-- <li><a href="#" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
					<li><a class="log-in-txt"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
				</div>
			</div>
		</nav>

		<!-- Sign Up new user registration modal -->
		<div class="modal fade" id="signUpModal" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">

					<!-- Modal header -->
					<div class="modal-header sign-in-modal-header">
						<button type="button" class="close sign-up-modal-close-btn" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center !important; font-weight:800 !important;">Create A New Account</h4>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div id="reg-modal-carousel" reg-modal-carousel class="carousel slide" data-ride="" data-interval="false">
							<div class="carousel-inner">
								<div class="item active sign-in-page">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Phone</label><span class="required-asterisk">*</span></div>
												<input id="userPhone" name="existinguser-phone" class="form-control" type="tel" placeholder="Phone No." onchange="CUSTOM_FUNCTIONS.phoneValidation(this)" onblur="CUSTOM_FUNCTIONS.phoneValidation(this)" value="" autocomplete="off" maxlength="10" required="required">
											</div>
										</div>
										<div class="col-md-12" style="color:red; text-align: center; font-weight:600;">
											<span show-error-msg></span>
										</div>
										<div class="col-md-12 sign-btn-section" style="text-align:center; margin-top: 15px;">
											<button type="button" class="btn" style="background-color:purple; color:white; padding:6px 20px !important;" data-login-btn>Log In</button>
										</div>
										<div class="col-md-12" style="text-align: center">
											Don't have an account?<a class="btn sign-up-btn" create-account-btn>Sign Up</a>
										</div>
									</div>
								</div>

								<div class="item registe-page">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>First Name</label><span class="required-asterisk">*</span></div>
												<input id="firstName" name="user-firstname" class="form-control" type="text" placeholder="Name" onchange="CUSTOM_FUNCTIONS.nameValidation(this)" onblur="CUSTOM_FUNCTIONS.nameValidation(this)" value="" autocomplete="off" maxlength="245"  required="required">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Last Name</label><span class="required-asterisk">*</span></div>
												<input id="lastName" name="user-lastname" class="form-control" type="text" placeholder="Name" onchange="CUSTOM_FUNCTIONS.nameValidation(this)" onblur="CUSTOM_FUNCTIONS.nameValidation(this)" value="" autocomplete="off" maxlength="245"  required="required">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Date Of Birth</label><span class="required-asterisk">*</span></div>
												<input id="userDob" name="user-dob" class="form-control" type="date" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','DOB')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','DOB')" value="" autocomplete="off" required="required" sign-up-dob-input>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Gender</label><span class="required-asterisk">*</span></div>
												<select id="userGender" name="user-gender" class="form-control" type="dropdown" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Gender')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Gender')" required="required" data-user-gender>
													<option value="" disabled selected>Select your gender</option>
													<option value="male">Male</option>
													<option value="female">Female</option>
													<option value="others">Others</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Phone</label><span class="required-asterisk">*</span></div>
												<input id="userPhone" name="user-phone" class="form-control" type="tel" pattern="[789][0-9]{9}" placeholder="Phone No." onchange="CUSTOM_FUNCTIONS.phoneValidation(this)" onblur="CUSTOM_FUNCTIONS.phoneValidation(this)" value="" autocomplete="off" maxlength="10" required="required" sign-up-phone-input>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Email</label><span class="required-asterisk">*</span></div>
												<input id="email-id" name="user-email" class="form-control" type="text" placeholder="Email-id" onchange="CUSTOM_FUNCTIONS.emailValidation(this,'true')" onblur="CUSTOM_FUNCTIONS.emailValidation(this,'true')" value="" autocomplete="off" maxlength="245" required="required">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group name-form-group" data-name-field="">
												<div><label>Address</label><span class="required-asterisk">*</span></div>
												<input id="address" name="user-address" class="form-control" type="text" placeholder="Address" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Address')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Address')" value="" autocomplete="off" maxlength="245" required="required">
											</div>
										</div>
										<div class="col-md-12 expected-percentile-btn" style="text-align:center; margin-top: 20px;">
											<button type="button" class="btn" style="background-color:purple; color:white; padding:6px 20px !important;" data-register-btn>Register Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Registered User Info/Profile Modal -->
		<div class="modal fade" id="regUserProfile" role="dialog" data-backdrop="static" data-keyboard="false" user-profile-info-modal>
			<!-- append from js -->
			<div class="modal-dialog">
				<div class="modal-content" modal-content>
					<div class="modal-header user-profile-header">
						<button type="button" class="close profile-cross-btn">&times;</button>
						<h4 class="modal-title">Your Profile</h4>
					</div>
					<div class="modal-body user-profile-body">
						<div class="row">
							<div class="col-sm-6 profile-field">
								<label>First Name:</label>
								<input type="text" name="user-info-fname" class="form-control user-info-input user-info-p user-info-fname" readonly="readonly" onchange="CUSTOM_FUNCTIONS.nameValidation(this)" onblur="CUSTOM_FUNCTIONS.nameValidation(this)">
							</div>
							<div class="col-sm-6 profile-field">
								<label>Last Name:</label>
								<input type="text" name="user-info-lname" class="form-control user-info-input user-info-p user-info-lname" readonly="readonly" onchange="CUSTOM_FUNCTIONS.nameValidation(this)" onblur="CUSTOM_FUNCTIONS.nameValidation(this)">
							</div>
							<div class="col-sm-6 profile-field">
									<label>Date Of Birth:</label>
									<input id="userDob" name="user-info-dob" class="form-control user-info-input user-info-p user-info-dob" type="date" readonly="readonly" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','DOB')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','DOB')" value="" autocomplete="off" required="required" sign-up-dob-input>
							</div>
							<div class="col-sm-6 profile-field">
								<label>Gender:</label>
								<select id="user-gender" name="user-info-gender" class="form-control user-info-input user-info-p user-info-gender" type="dropdown" readonly="readonly" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Gender')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Gender')" required="required" data-user-gender>
									<option value="" disabled>Select your gender</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="others">Others</option>
								</select>
							</div>
							<div class="col-sm-12 profile-field">
								<label>Contact Number:</label>&nbsp;<button type="button" class="btn mob-no-change hidden">Change<span class="glyphicon glyphicon-pencil"></span></button>
								<input type="tel" name="user-info-phone" class="form-control user-info-p user-info-phone" readonly="readonly" onchange="CUSTOM_FUNCTIONS.phoneValidation(this)" onblur="CUSTOM_FUNCTIONS.phoneValidation(this)" maxlength="10">
							</div>
							<div class="col-sm-12 profile-field new-phone-field hidden">
								<label>Add New Phone Number:</label>
								<input type="tel" name="user-info-new-phone" class="form-control user-info-input user-info-new-phone" onchange="CUSTOM_FUNCTIONS.optionalPhoneValidation(this,'true')" onblur="CUSTOM_FUNCTIONS.optionalPhoneValidation(this,'true')" maxlength="10" replace-new-number>
							</div>
							<div class="col-sm-12 profile-field">
								<label>Email:</label>
								<input type="email" name="user-info-email" class="form-control user-info-input user-info-p user-info-email" readonly="readonly" onchange="CUSTOM_FUNCTIONS.emailValidation(this,'true')" onblur="CUSTOM_FUNCTIONS.emailValidation(this,'true')">
							</div>
							<div class="col-sm-12 profile-field">
								<label>Address:</label>
								<input type="text" name="user-info-address" class="form-control user-info-input user-info-p user-info-address" readonly="readonly" onchange="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Address')" onblur="CUSTOM_FUNCTIONS.basicRequiredValidation(this,'','Address')">
							</div>
							<div class="col-sm-12 profile-field profile-field-btn-section">
								<button type="button" class="btn edit-user-btn" style="background-color:purple; color:white; padding:2px 16px !important;" edit-user-btn>Edit Profile</button>
								<button type="button" class="btn save-edit-btn hidden" style="background-color:green; color:white; padding:2px 16px !important;" save-edit-btn>Update Profile</button>
							</div>
						</div>
					</div>
					<div class="modal-footer user-profile-header user-profile-footer">
						<div class="col-sm-12 profile-field" style="margin-top:2px !important; margin-bottom:2px !important; color:aliceblue !important;">
							want to switch another account?<button type="button" class="btn log-out-btn" log-out-btn>Log Out</button>
						</div><br>
					</div>
				</div>
			</div>
		</div>

	</header>