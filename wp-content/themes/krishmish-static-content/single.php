<?php
/**
 * The template for displaying single post
 *
 * @package WordPress
 * @subpackage KrishMish_Static_Content
 * @since KrishMish_Static_Content 1.0
*/

global $post;
$post_id            =   $post->ID;
$feature_img        =   getPostFeaturedImage($post_id);
$img_id             =   get_post_thumbnail_id($post_id);
$img_alt            =   get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
if($img_alt == ''){
    $img_alt = 'Blog Feature Image';
}
$author_id          =   get_post_field ('post_author', $post_id);
$post_author_name   =   get_the_author_meta( 'display_name' , $author_id ); 
$category           =   get_the_category($post->ID);
$parent_category    =   '';
$post_title_txt     =   get_the_title();

//get related posts upto 12posts
if(count($category) > 1){
    $len_category           =   count($category);
    $first_category_index   =   $len_category - 1;
    $first_category         =   $category[$first_category_index];
    $parent_category        =   $category[$first_category_index-1]->term_id;
}else{
    $first_category         =   $category[0];
}

if($parent_category != ''){
    $parent_category_termid   =   $parent_category;
}else{
    $parent_category_termid   =   '';
}
$args = array( 'posts_per_page' => 12, 'offset'=> 0, 'category' => array($first_category->term_id,$parent_category_termid), 'post__not_in' => array( $post_id ), 'orderby' => array( 'title' => 'ASC', 'date' => 'DESC' ), 'post_status' => 'publish');
$cat_related_posts = get_posts($args);


if (have_posts()):
    while (have_posts()) :
        the_post();
        $get_the_content    =   get_the_content();
        $fullContent        =   (apply_filters( 'the_content', $get_the_content)); // get_the_content() does not pass the content through the_content. Which means that it does not auto-embed videos, or expand shortcodes, paragraphs etc few things.
    endwhile;
endif;

$current_url            =   urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$post_feature_img       =   '<div class="col-sm-12 post-page-feature-img-section feature-img-section-inside-content" style="margin-bottom:25px; padding-left:0px; padding-right:0px">
                                <img src="'.$feature_img.'" alt="'.$img_alt.'" class="post-page-banner-img-style" width="780" height="390">
                            </div>';
$country_code           =   getCountryCode();
if($country_code == 'UK' || $country_code == 'GB'){
    $country            =   'uk';
    $utm_source         =   'UK_Home';
    $mid_banner_href    =   "https://byjus.com/uk/math/?device=device_type&utm_source=UK_Home&utm_medium=mid_banner&utm_campaign=beyond_tutoring_bmc&utm_term=".$current_url;
}else if($country_code == 'AU'|| $country_code == 'NZ'){
    $country            =   'au';
    $utm_source         =   'AU_Home';
    $mid_banner_href    =   "https://byjus.com/au/math/?device=device_type&utm_source=AU_Home&utm_medium=mid_banner&utm_campaign=beyond_tutoring_bmc&utm_term=".$current_url;
}else{
    $country            =   'us';
    $utm_source         =   'bmc_blog';
    $mid_banner_href    =   "https://byjus.com/us/math/?device=device_type&utm_source=bmc_blog&utm_medium=mid_banner&utm_campaign=beyond_tutoring_bmc&utm_term=".$current_url;
}
$mid_banner             =   '<div class="bmc-math-banner-section mid-banner-section">
                                <a class="bmc-custom-banner-redirection" href="https://byjus.com/user_country/math/?device=device_type&utm_source=bmc_blog&utm_medium=mid_banner&utm_campaign=beyond_tutoring_bmc&utm_term="'.$current_url.'" banner-medium="mid-banner-click">
                                    <picture>
                                        <source media="(max-width: 767.98px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234133/math-companion-mobile.webp"/>
                                        <source media="(min-width: 768px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234012/math-companion-desktop-scaled.webp"/>
                                        <img class="banner-img-custom-css bmc-custom-banner-img" src="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234133/math-companion-mobile.webp" alt="Learn With Math Companion" banner-medium="mid-banner-view" style="height:auto !important;" object-visible="0" width="1032" height="432">
                                    </picture>
                                </a>
                            </div>';

$mid_banner_position    =   'after_2nd_p';

$end_article_content    =   '   </div>
                            </article>
                            <!-- End of article tag -->

                            <!-- bottom banner section -->
                            <div class="col-sm-12 bmc-math-banner-section">
                                <a class="bmc-custom-banner-redirection" href="https://byjus.com/user_country/math/?device=device_type&utm_source=bmc_blog&utm_medium=bottom_banner&utm_campaign=beyond_tutoring_bmc&utm_term="'.$current_url.'" banner-medium="bottom-banner-click">
                                    <picture>
                                        <source media="(max-width: 767.98px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234133/math-companion-mobile.webp"/>
                                        <source media="(min-width: 768px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234012/math-companion-desktop-scaled.webp"/>
                                        <img class="banner-img-custom-css bmc-custom-banner-img bottom-banner-img" src="https://math-media.byjusfutureschool.com/bfs-math/2023/09/01234133/math-companion-mobile.webp" loading="lazy" alt="Learn With Math Companion" banner-medium="bottom-banner-view" object-visible="0" width="1032" height="480">
                                    </picture>
                                </a>
                            </div>

                            <!-- end article share btn section -->
                            <div class="col-sm-12 custom-share-on-col hidden">
                                <div class="share-on-heading" style="margin-top: 10px; margin-bottom:10px;">Share on:</div>
                                <div class="row end-article-share-btn-section">
                                    <div class="col-md-2 col-sm-2 col-xs-2 end-article-share-btn first-share-btn">
                                        <a class="share-on-link" href="<?=$fb_share_link?>" target="_blank" rel="nofollow noopener" share-medium="facebook" position="bottom"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 0.5C7.21573 0.5 0.5 7.21573 0.5 15.5C0.5 23.7843 7.21573 30.5 15.5 30.5C23.7843 30.5 30.5 23.7843 30.5 15.5C30.5 7.21573 23.7843 0.5 15.5 0.5ZM16.3197 15.9991V24H12.7723V15.9994H11V13.2422H12.7723V11.5868C12.7723 9.33752 13.773 8 16.6162 8H18.9832V10.7575H17.5037C16.3969 10.7575 16.3237 11.1428 16.3237 11.8619L16.3197 13.2419H19L18.6864 15.9991H16.3197Z" fill="#231752"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 end-article-share-btn">
                                        <a class="share-on-link" target="_blank" rel="nofollow noopener" href="<?=$twitter_share_link?>" share-medium="twitter" position="bottom"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 0.5C7.21573 0.5 0.5 7.21573 0.5 15.5C0.5 23.7843 7.21573 30.5 15.5 30.5C23.7843 30.5 30.5 23.7843 30.5 15.5C30.5 7.21573 23.7843 0.5 15.5 0.5ZM15.3159 13.402L15.2834 12.9262C15.1858 11.693 16.042 10.5667 17.3968 10.1297C17.8954 9.97439 18.7408 9.95497 19.2935 10.0909C19.5103 10.1492 19.9222 10.3434 20.2148 10.5181L20.7459 10.8386L21.3311 10.6735C21.6563 10.5861 22.0898 10.4405 22.2849 10.3434C22.4692 10.256 22.6317 10.2074 22.6317 10.2366C22.6317 10.4016 22.2307 10.9648 21.8947 11.2755C21.4395 11.7124 21.5696 11.7513 22.4908 11.46C23.0436 11.2949 23.0544 11.2949 22.9461 11.4794C22.881 11.5765 22.545 11.9164 22.1874 12.2271C21.5804 12.7611 21.5479 12.8194 21.5479 13.266C21.5479 13.9554 21.1794 15.3925 20.8109 16.179C20.1281 17.6549 18.6649 19.1793 17.2017 19.9464C15.1425 21.0242 12.4004 21.296 10.0918 20.6649C9.32228 20.4513 8 19.9075 8 19.8104C8 19.7813 8.40102 19.7425 8.88874 19.7328C9.90755 19.7133 10.9263 19.4609 11.7934 19.0142L12.3787 18.7035L11.7067 18.4996C10.7529 18.2083 9.89671 17.5383 9.67994 16.9072C9.61491 16.7033 9.63659 16.6936 10.2435 16.6936L10.8722 16.6839L10.3411 16.4605C9.71246 16.179 9.13802 15.7032 8.85623 15.2177C8.6503 14.8681 8.39018 13.9845 8.46605 13.9166C8.48772 13.8874 8.71533 13.9457 8.97545 14.0234C9.72329 14.2661 9.82084 14.2079 9.38731 13.8001C8.57443 13.0621 8.32515 11.9649 8.71533 10.926L8.89958 10.4599L9.61491 11.091C11.0781 12.363 12.8014 13.1204 14.774 13.3437L15.3159 13.402Z" fill="#231752"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 end-article-share-btn">
                                        <a class="share-on-link" href="<?= $linkedin_share_link ?>" target="_blank" rel="nofollow noopener" share-medium="linkedin" position="bottom"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 0.5C7.21573 0.5 0.5 7.21573 0.5 15.5C0.5 23.7843 7.21573 30.5 15.5 30.5C23.7843 30.5 30.5 23.7843 30.5 15.5C30.5 7.21573 23.7843 0.5 15.5 0.5ZM9.5 11.5H12.5V21.5H9.5V11.5ZM13 8.99931C12.9769 7.86441 12.2279 7 11.0115 7C9.7952 7 9 7.86441 9 8.99931C9 10.1107 9.7717 11 10.9654 11H10.9881C12.2279 11 13 10.1107 13 8.99931ZM20.7285 11.5C22.884 11.5 24.5 12.8967 24.5 15.8977L24.4999 21.4997H21.2244V16.2726C21.2244 14.9597 20.7504 14.0638 19.5646 14.0638C18.6596 14.0638 18.1206 14.6677 17.8839 15.2511C17.7973 15.4602 17.776 15.7514 17.776 16.0435V21.5H14.5C14.5 21.5 14.5432 12.6465 14.5 11.7297H17.776V13.1136C18.2108 12.4483 18.9894 11.5 20.7285 11.5Z" fill="#231752"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 end-article-share-btn last-share-btn">
                                        <a class="copy-page-link share-on-link" share-medium="copy link" position="bottom" style="cursor: pointer;"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 15.5C0.5 7.21573 7.21573 0.5 15.5 0.5C23.7843 0.5 30.5 7.21573 30.5 15.5C30.5 23.7843 23.7843 30.5 15.5 30.5C7.21573 30.5 0.5 23.7843 0.5 15.5Z" fill="#231752"/>
                                                <path d="M16.0449 19.3672C16.1176 19.4396 16.1753 19.5257 16.2147 19.6205C16.254 19.7152 16.2743 19.8168 16.2743 19.9195C16.2743 20.0221 16.254 20.1237 16.2147 20.2185C16.1753 20.3133 16.1176 20.3993 16.0449 20.4718L15.6589 20.8577C14.9274 21.5891 13.9352 22 12.9007 22C11.8662 22 10.874 21.5891 10.1425 20.8577C9.41096 20.1264 9 19.1344 9 18.1001C9 17.0658 9.41096 16.0738 10.1425 15.3425L11.7101 13.7758C12.4129 13.0714 13.3586 12.6623 14.3534 12.6323C15.3481 12.6024 16.3167 12.9538 17.0607 13.6147C17.1375 13.683 17.2001 13.7657 17.245 13.8581C17.2898 13.9506 17.316 14.051 17.322 14.1536C17.3281 14.2561 17.3138 14.3589 17.2802 14.456C17.2465 14.553 17.194 14.6425 17.1257 14.7193C17.0574 14.7961 16.9747 14.8587 16.8822 14.9035C16.7897 14.9484 16.6893 14.9745 16.5868 14.9806C16.4842 14.9866 16.3814 14.9724 16.2843 14.9387C16.1872 14.905 16.0977 14.8526 16.0209 14.7843C15.5747 14.3881 14.994 14.1774 14.3976 14.1951C13.8012 14.2129 13.2341 14.4578 12.8123 14.8798L11.246 16.4445C10.8072 16.8832 10.5606 17.4783 10.5606 18.0988C10.5606 18.7193 10.8072 19.3144 11.246 19.7531C11.6849 20.1919 12.2801 20.4384 12.9007 20.4384C13.5213 20.4384 14.1165 20.1919 14.5553 19.7531L14.9414 19.3672C15.0138 19.2947 15.0998 19.2372 15.1945 19.1979C15.2892 19.1587 15.3907 19.1385 15.4932 19.1385C15.5956 19.1385 15.6971 19.1587 15.7918 19.1979C15.8865 19.2372 15.9725 19.2947 16.0449 19.3672ZM20.8594 10.1404C20.1273 9.4101 19.1354 9 18.1012 9C17.0671 9 16.0751 9.4101 15.343 10.1404L14.957 10.5263C14.8105 10.6728 14.7282 10.8715 14.7282 11.0786C14.7282 11.2858 14.8105 11.4845 14.957 11.6309C15.1035 11.7774 15.3022 11.8597 15.5094 11.8597C15.7166 11.8597 15.9153 11.7774 16.0618 11.6309L16.4479 11.245C16.8867 10.8062 17.4819 10.5597 18.1025 10.5597C18.7231 10.5597 19.3183 10.8062 19.7572 11.245C20.196 11.6837 20.4426 12.2788 20.4426 12.8993C20.4426 13.5198 20.196 14.1149 19.7572 14.5536L18.1903 16.1209C17.7681 16.5427 17.2007 16.7873 16.6041 16.8045C16.0075 16.8218 15.4269 16.6105 14.981 16.2138C14.9042 16.1455 14.8147 16.0931 14.7176 16.0594C14.6205 16.0257 14.5177 16.0115 14.4151 16.0175C14.3126 16.0236 14.2122 16.0497 14.1197 16.0946C14.0272 16.1394 13.9445 16.202 13.8762 16.2788C13.8079 16.3556 13.7554 16.4451 13.7217 16.5421C13.6881 16.6392 13.6738 16.742 13.6799 16.8445C13.6859 16.9471 13.7121 17.0475 13.7569 17.14C13.8018 17.2324 13.8644 17.3151 13.9412 17.3834C14.6847 18.0441 15.6526 18.3958 16.6469 18.3665C17.6412 18.3371 18.5867 17.9289 19.2899 17.2255L20.8575 15.6589C21.5887 14.9271 21.9996 13.9351 22 12.9007C22.0004 11.8663 21.5902 10.874 20.8594 10.1417V10.1404Z" fill="#F9F7FC"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start of FAQ section --> ';

$get_current_page_url   =   ($_SERVER["HTTPS"] ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
// $fb_share_link          =   "https://www.facebook.com/sharer/sharer.php?u=".$get_current_page_url;
$fb_share_link          =   "https://www.addtoany.com/add_to/facebook?linkurl=".$get_current_page_url."&linkname=".$post_title_txt;
$whatsapp_share_link    =   "https://api.whatsapp.com/send?text=".$get_current_page_url;
// $twitter_share_link     =   "http://twitter.com/share?text=".$post_title_txt."&url=".$get_current_page_url;
$twitter_share_link     =   "https://www.addtoany.com/add_to/twitter?linkurl=".$get_current_page_url."&linkname=".$post_title_txt;
$gmail_share_link       =   "mailto:?subject=".$post_title_txt."&body=".$get_current_page_url;
$linkedin_share_link    =   "https://www.linkedin.com/shareArticle?mini=true&url=".$get_current_page_url."&title=".$post_title_txt;

get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main id="main-content" class="main-content-style article-page-main-content" page-type="blogs" page-title="<?=$post_title_txt?>">

        <!-- Progressive reading bar -->
        <div class="container-fluid" style="margin-top: 56px;">
            <div class="row progress-bar-row">
                <div class="post-progress-bar" id="post-progress-bar"></div>
            </div>
        </div>

        <!-- Post body/content section -->
        <div class="container" style="margin-top:10px">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <!-- top banner section -->
                        <div class="col-md-12 bmc-custom-banner-post-page" style="margin-top:25px;">
                            <a class="bmc-custom-banner-redirection" href="<?php echo "https://byjus.com/user_country/math/?device=device_type&utm_source=bmc_blog&utm_medium=top_banner&utm_campaign=beyond_tutoring_bmc&utm_term=".urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" banner-medium="top-banner-click">
                                <picture>
                                    <source media="(max-width: 767.98px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/08/25193335/blog-header-banner-mob.webp"/>
                                    <source media="(min-width: 768px)" srcset="https://math-media.byjusfutureschool.com/bfs-math/2023/08/25193340/blog-header-banner-scaled.webp"/>
                                    <img class="humepage-top-banner-img bmc-custom-banner-img postpage-top-banner-img" src="https://math-media.byjusfutureschool.com/bfs-math/2023/08/25193335/blog-header-banner-mob.webp" alt="BOOK A DEMO WITH AN EXPERT" style="width:100% !important;" banner-medium="top-banner-view" object-visible="0" width="1032" height="480">
                                </picture>
                            </a>
                        </div>

                        <!-- Breadcrumb section -->
                        <div class="col-sm-12 breadcrumb-col-style post-page-breadcrumb-section">
                            <ul class="blog-breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=home_url()?>">Home</a></li>
                                <?php 
                                    foreach($category as $cat){ ?>
                                        <li class="breadcrumb-item"><a href="<?php echo sprintf( '%s', get_category_link( $cat ), $cat->name ); ?>"><?=$cat->name?></a></li>
                                <?php } ?>
                                <li class="breadcrumb-item active breadcrumb-item-active"><?php echo get_the_title();?></li>
                            </ul>
                        </div>

                        <!-- content section -->
                        <div class="col-sm-12" style="margin-top:20px;">
                            <div class="row custom-blog-post-section">

                                <!-- Start of article tag -->
                                <article>
                                    <div class="col-sm-12">
                                        <h1 class="blog-post-heading"><?php echo get_the_title(); ?></h1>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-8 col-xs-8">
                                                <div class="read-time-section read-time-opacity category-page-read-time-section read-time-section-style">
                                                    <!-- <div class="watch-icon-section">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                                            <path d="M5 1.71429V0H10V1.71429H5ZM6.66667 11.1429H8.33333V6H6.66667V11.1429ZM7.5 18C6.47222 18 5.50333 17.7963 4.59333 17.3889C3.68333 16.9814 2.88833 16.428 2.20833 15.7286C1.52778 15.0286 0.989445 14.2106 0.593334 13.2746C0.197223 12.3386 -0.000554388 11.3423 1.16713e-06 10.2857C1.16713e-06 9.22857 0.198057 8.232 0.594168 7.296C0.990279 6.36 1.52833 5.54229 2.20833 4.84286C2.88889 4.14286 3.68417 3.58914 4.59417 3.18171C5.50417 2.77429 6.47278 2.57086 7.5 2.57143C8.36111 2.57143 9.1875 2.71429 9.97917 3C10.7708 3.28571 11.5139 3.7 12.2083 4.24286L13.375 3.04286L14.5417 4.24286L13.375 5.44286C13.9028 6.15714 14.3056 6.92143 14.5833 7.73571C14.8611 8.55 15 9.4 15 10.2857C15 11.3429 14.8019 12.3394 14.4058 13.2754C14.0097 14.2114 13.4717 15.0291 12.7917 15.7286C12.1111 16.4286 11.3158 16.9823 10.4058 17.3897C9.49583 17.7971 8.52722 18.0006 7.5 18ZM7.5 16.2857C9.11111 16.2857 10.4861 15.7 11.625 14.5286C12.7639 13.3571 13.3333 11.9429 13.3333 10.2857C13.3333 8.62857 12.7639 7.21429 11.625 6.04286C10.4861 4.87143 9.11111 4.28571 7.5 4.28571C5.88889 4.28571 4.51389 4.87143 3.375 6.04286C2.23611 7.21429 1.66667 8.62857 1.66667 10.2857C1.66667 11.9429 2.23611 13.3571 3.375 14.5286C4.51389 15.7 5.88889 16.2857 7.5 16.2857Z" fill="#3F3F57"/>
                                                        </svg>
                                                    </div> -->
                                                    <?php if( function_exists('get_readtime_of_post') ){ ?>
                                                        <div class="read-time-txt read-time-txt-style"><?= get_readtime_of_post($post_id); esc_html_e('min read', 'veen'); ?></div>
                                                    <?php } ?>
                                                    <div class="post-publish-date-section"><?= the_date("M d, Y")?></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-4" style="text-align: right;">

                                                <div class="dropdown share-btn-dropdown-section">
                                                    <button class="dropdown-toggle post-share-button" type="button" data-toggle="dropdown">
                                                        <span class="share-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                <path d="M8.5 4.5C9.32843 4.5 10 3.82843 10 3C10 2.17157 9.32843 1.5 8.5 1.5C7.67157 1.5 7 2.17157 7 3C7 3.82843 7.67157 4.5 8.5 4.5Z" stroke="#3F3F57" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M2.5 7.5C3.32843 7.5 4 6.82843 4 6C4 5.17157 3.32843 4.5 2.5 4.5C1.67157 4.5 1 5.17157 1 6C1 6.82843 1.67157 7.5 2.5 7.5Z" stroke="#3F3F57" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M8.5 11.5C9.32843 11.5 10 10.8284 10 10C10 9.17157 9.32843 8.5 8.5 8.5C7.67157 8.5 7 9.17157 7 10C7 10.8284 7.67157 11.5 8.5 11.5Z" stroke="#3F3F57" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 7.5L7 9.5" stroke="#3F3F57" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M7 3.5L4 5.5" stroke="#3F3F57" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                        <p class="post-share-btn-txt">Share</p>
                                                    </button>
                                                    <!-- <div class="dropdown-open-icon"></div> -->
                                                    <ul class="dropdown-menu share-btn-dropdown-menu">
                                                        <div class="dropdown-open-icon"></div>
                                                        <li>
                                                            <a class="copy-page-link copy-page-link-style share-page-link share-on-link" share-medium="copy link" position="top">
                                                                <svg class="share-btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8Z" fill="#9C9CAE"/>
                                                                    <path d="M8.29049 10.0624C8.32927 10.101 8.36004 10.1469 8.38103 10.1974C8.40203 10.248 8.41283 10.3022 8.41283 10.3569C8.41283 10.4117 8.40203 10.4658 8.38103 10.5164C8.36004 10.5669 8.32927 10.6129 8.29049 10.6515L8.0846 10.8573C7.69446 11.2474 7.16531 11.4665 6.61357 11.4665C6.06182 11.4665 5.53267 11.2474 5.14253 10.8573C4.75238 10.4673 4.5332 9.93823 4.5332 9.38659C4.5332 8.83495 4.75238 8.30591 5.14253 7.91585L5.97857 7.08032C6.35343 6.70461 6.85778 6.48642 7.38833 6.47044C7.91888 6.45446 8.43546 6.64191 8.83226 6.99438C8.87322 7.03078 8.90662 7.0749 8.93053 7.12421C8.95444 7.17352 8.96841 7.22706 8.97162 7.28176C8.97484 7.33647 8.96725 7.39127 8.94929 7.44305C8.93132 7.49482 8.90333 7.54255 8.86692 7.58351C8.8305 7.62447 8.78638 7.65785 8.73706 7.68176C8.68774 7.70567 8.63419 7.71963 8.57947 7.72285C8.52476 7.72606 8.46994 7.71848 8.41816 7.70051C8.36637 7.68255 8.31864 7.65457 8.27767 7.61816C8.03972 7.40688 7.73003 7.29448 7.41193 7.30395C7.09384 7.31342 6.79138 7.44404 6.56643 7.6691L5.73108 8.50359C5.49703 8.73759 5.36554 9.05497 5.36554 9.3859C5.36554 9.71683 5.49703 10.0342 5.73108 10.2682C5.96513 10.5022 6.28257 10.6337 6.61357 10.6337C6.94456 10.6337 7.262 10.5022 7.49605 10.2682L7.70194 10.0624C7.74057 10.0237 7.78644 9.99302 7.83694 9.97209C7.88743 9.95116 7.94156 9.94039 7.99622 9.94039C8.05088 9.94039 8.105 9.95116 8.1555 9.97209C8.20599 9.99302 8.25187 10.0237 8.29049 10.0624ZM10.8582 5.14139C10.4678 4.75193 9.93874 4.5332 9.38719 4.5332C8.83564 4.5332 8.30661 4.75193 7.91615 5.14139L7.71026 5.34724C7.63212 5.42536 7.58822 5.53132 7.58822 5.64181C7.58822 5.75229 7.63212 5.85825 7.71026 5.93637C7.7884 6.01449 7.89438 6.05838 8.00488 6.05838C8.11539 6.05838 8.22137 6.01449 8.29951 5.93637L8.5054 5.73052C8.73945 5.49652 9.05689 5.36506 9.38788 5.36506C9.71888 5.36506 10.0363 5.49652 10.2704 5.73052C10.5044 5.96452 10.6359 6.2819 10.6359 6.61283C10.6359 6.94376 10.5044 7.26113 10.2704 7.49514L9.43468 8.33101C9.20953 8.55597 8.9069 8.68641 8.58872 8.69562C8.27055 8.70483 7.96088 8.59213 7.72308 8.38056C7.68212 8.34416 7.63438 8.31617 7.5826 8.29821C7.53081 8.28025 7.476 8.27266 7.42128 8.27588C7.36657 8.2791 7.31302 8.29306 7.2637 8.31697C7.21438 8.34087 7.17025 8.37426 7.13384 8.41522C7.09742 8.45618 7.06943 8.50391 7.05147 8.55568C7.0335 8.60745 7.02591 8.66226 7.02913 8.71696C7.03235 8.77167 7.04631 8.8252 7.07023 8.87451C7.09414 8.92382 7.12753 8.96794 7.1685 9.00435C7.56502 9.35674 8.08125 9.5443 8.61155 9.52865C9.14185 9.51299 9.64611 9.29531 10.0211 8.92014L10.8572 8.08461C11.2472 7.69432 11.4663 7.16526 11.4665 6.61356C11.4667 6.06187 11.248 5.53265 10.8582 5.14208V5.14139Z" fill="#F9F7FC"/>
                                                                </svg>
                                                                <p class="share-btn-txt">Copy Link</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-page-link media-platform share-on-link" href="<?=$twitter_share_link?>" share-medium="twitter" position="top">
                                                                <svg class="share-btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM7.9018 6.88104L7.88446 6.62729C7.83243 5.96961 8.28909 5.3689 9.01164 5.13586C9.27754 5.05301 9.72842 5.04265 10.0232 5.11515C10.1388 5.14622 10.3585 5.24979 10.5146 5.34301L10.7978 5.5139L11.1099 5.42586C11.2834 5.37926 11.5146 5.30158 11.6186 5.24979C11.7169 5.20319 11.8036 5.17729 11.8036 5.19283C11.8036 5.28086 11.5897 5.58122 11.4105 5.74693C11.1677 5.97997 11.2371 6.00069 11.7284 5.84533C12.0233 5.75729 12.029 5.75729 11.9712 5.85569C11.9365 5.90747 11.7574 6.08872 11.5666 6.25444C11.2429 6.53926 11.2256 6.57033 11.2256 6.80854C11.2256 7.17622 11.029 7.94265 10.8325 8.36211C10.4683 9.14925 9.68795 9.96229 8.90759 10.3714C7.80931 10.9462 6.34686 11.0912 5.11563 10.7546C4.70521 10.6407 4 10.3507 4 10.2989C4 10.2834 4.21388 10.2626 4.474 10.2575C5.01736 10.2471 5.56072 10.1125 6.02315 9.87425L6.3353 9.70854L5.97691 9.59979C5.46823 9.44443 5.01158 9.08711 4.89597 8.75051C4.86129 8.64176 4.87285 8.63658 5.19655 8.63658L5.53182 8.6314L5.24858 8.51229C4.91331 8.36211 4.60695 8.10836 4.45666 7.84943C4.34683 7.66301 4.2081 7.19176 4.24856 7.15551C4.26012 7.13997 4.38151 7.17104 4.52024 7.21247C4.91909 7.34193 4.97111 7.31086 4.7399 7.09336C4.30636 6.69979 4.17341 6.11461 4.38151 5.56051L4.47978 5.31194L4.86129 5.64854C5.64165 6.32693 6.56074 6.73086 7.61278 6.84997L7.9018 6.88104Z" fill="#9C9CAE"/>
                                                                </svg>
                                                                <p class="share-btn-txt">Share on Twitter</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-page-link share-on-link" href="<?=$fb_share_link?>" share-medium="facebook" position="top">
                                                                <svg class="share-btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM8.43715 8.26617V12.5333H6.54521V8.26633H5.6V6.79584H6.54521V5.91297C6.54521 4.71335 7.07893 4 8.59531 4H9.85773V5.47066H9.06863C8.47834 5.47066 8.43929 5.67616 8.43929 6.05968L8.43715 6.79568H9.86667L9.69939 8.26617H8.43715Z" fill="#9C9CAE"/>
                                                                </svg>
                                                                <p class="share-btn-txt">Share on Facebook</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-page-link share-on-link" href="<?= $linkedin_share_link ?>" share-medium="linkedin" position="top">
                                                                <svg class="share-btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM4.8 5.86667H6.4V11.2H4.8V5.86667ZM6.66667 4.53296C6.65436 3.92768 6.25487 3.46667 5.60615 3.46667C4.95744 3.46667 4.53333 3.92768 4.53333 4.53296C4.53333 5.12571 4.9449 5.6 5.58154 5.6H5.59366C6.25487 5.6 6.66667 5.12571 6.66667 4.53296ZM10.7886 5.86667C11.9382 5.86667 12.8 6.61159 12.8 8.21213L12.7999 11.1999H11.053V8.41206C11.053 7.71183 10.8002 7.23401 10.1678 7.23401C9.68514 7.23401 9.39766 7.55613 9.2714 7.86725C9.22521 7.97875 9.21387 8.13411 9.21387 8.28984V11.2H7.46667C7.46667 11.2 7.48969 6.47812 7.46667 5.98917H9.21387V6.72724C9.44574 6.37243 9.86101 5.86667 10.7886 5.86667Z" fill="#9C9CAE"/>
                                                                </svg>
                                                                <p class="share-btn-txt">Share on Linkedin</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 author-name-section">
                                        <p><span class="author-name-p">Author: </span><a class="author-profile-link" href="https://byjus.com/us/math/">BYJU’S Math Companion Tutor</a></p>
                                    </div>

                                    <!-- Modify content by adding mid banner at some specific place of the content -->
                                    <?php
                                        //  Show Feature image of the post
                                        if(strpos($fullContent,"</p>") !== false){
                                            $pos = strpos($fullContent,"</p>") + 4;
                                            $fullContent = substr_replace($fullContent, $post_feature_img, $pos, 0);
                                        }else{ ?>
                                            <div class="col-sm-12 post-page-feature-img-section">
                                                <img src="<?= $feature_img ?>" alt="<?=$img_alt?>" class="post-page-banner-img-style" width="780" height="390">
                                            </div>
                                    <?php }
                                        // Add mid-banner in between content
                                        // if($mid_banner_position == "after_1st_p"){
                                        //     if(strpos($fullContent,"</p>") !== false){
                                        //         $pos = strpos($fullContent,"</p>") + 4;
                                        //         $newstr = substr_replace($fullContent, $mid_banner, $pos, 0);
                                        //     }
                                        // }else if($mid_banner_position=="after_2nd_p"){
                                        //     if(strpos($fullContent, "</p>", strpos($fullContent, "</p>") + strlen("</p>"))!== false){
                                        //         $pos = strpos($fullContent, "</p>", strpos($fullContent, "</p>") + 4);
                                        //         $newstr = substr_replace($fullContent, $mid_banner, $pos, 0);
                                        //     }
                                        // }else if($mid_banner_position == "before_2nd_h2"){
                                        //     if(strpos($fullContent, "<h2", strpos($fullContent, "<h2") + strlen("<h2"))!== false){
                                        //         $pos = strpos($fullContent, "<h2", strpos($fullContent, "<h2") + strlen("<h2"));
                                        //         $newstr = substr_replace($fullContent, $mid_banner, $pos, 0);
                                        //     }
                                        // }

                                        // modify end article content
                                        $newstr         =   '';
                                        if(strpos($fullContent,"[END_ARTICLE]") !== false){
                                            $pos        =   strpos($fullContent,"[END_ARTICLE]") + 13;
                                            $newstr     =   substr_replace($fullContent, $end_article_content, $pos, 0);
                                            $newstr     =   str_replace('[END_ARTICLE]','',$newstr);
                                        }else{
                                            $newstr     =   $fullContent;
                                            $newstr    .=   $end_article_content;
                                        }
                                    ?>

                                    <!-- Post Content Section -->

                                    <!-- Show first two paragraphs -->
                                    <div class="col-sm-12 post-content-section post-content-custom-height" style="margin-top:20px;">
                                        <?php 
                                            $explode_content    =   explode('</p>',$fullContent);
                                            echo $explode_content[0];
                                            echo $explode_content[1];
                                            // echo $explode_content[3];
                                        ?>
                                        <div class="gradientback"></div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 view-all-btn-section read-more-btn-section" style="margin-bottom:20px;">
                                        <a class="read-more-btn">Read More</a>
                                    </div>
                                    <!-- Show full content after clicking read more-->
                                    <div class="col-sm-12 post-content-section post-content-auto-height hidden" style="margin-top:0px;">
                                        <?php 
                                            // the_content();
                                            $final_content                 =   '';
                                            $final_content                .=   $mid_banner;  
                                                $explode_modify_content    =   explode('</p>',$newstr);
                                                for($i=2 ; $i<count($explode_modify_content); $i++){
                                                    $final_content        .=   $explode_modify_content[$i];
                                                }
                                                

                                            // display content
                                            echo $final_content;
                                        ?>
                                    <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>

        <!-- Related articles/posts section -->
        <section class="related-post-section">
            <div class="container">
                <div class="category-heading" style="margin-top:10px; margin-bottom:10px;">Related articles</div>
                <div class="row">
                    <!-- For Desktop-->
                    <div id="carousel-desktop" class="col-sm-12 carousel slide related-post-desktop" data-interval="false" data-ride="carousel">
                        <a class="carousel-control-prev" data-href="#carousel-desktop" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
                                <g filter="url(#filter0_bd_1_10624)">
                                    <rect width="40" height="41" rx="20" transform="matrix(-1 0 0 1 48 4)" fill="white" shape-rendering="crispEdges"/>
                                    <path d="M30 18L24 24.5L30 31" stroke="#6A6A86" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <filter id="filter0_bd_1_10624" x="-92" y="-96" width="240" height="241" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="50"/>
                                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1_10624"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="4"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.521569 0 0 0 0 0.478431 0 0 0 0 0.670588 0 0 0 0.08 0"/>
                                    <feBlend mode="normal" in2="effect1_backgroundBlur_1_10624" result="effect2_dropShadow_1_10624"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1_10624" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>
                        </a>
                        <a class="carousel-control-next" data-href="#carousel-desktop" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
                                <g filter="url(#filter0_bd_1_10620)">
                                    <rect x="8" y="4" width="40" height="41" rx="20" fill="white" shape-rendering="crispEdges"/>
                                    <path d="M26 18L32 24.5L26 31" stroke="#6A6A86" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <filter id="filter0_bd_1_10620" x="-92" y="-96" width="240" height="241" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="50"/>
                                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1_10620"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="4"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.521569 0 0 0 0 0.478431 0 0 0 0 0.670588 0 0 0 0.08 0"/>
                                    <feBlend mode="normal" in2="effect1_backgroundBlur_1_10620" result="effect2_dropShadow_1_10620"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1_10620" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>
                        </a>
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $k = 0; $count=0; $carousel_count = 0;
                            while($k<count($cat_related_posts)){ ?>
                                <?php 
                                    if($count==0){
                                        $active = 'active';
                                    }else{
                                        $active = '';
                                    }  
                                ?>
                                <div class="item <?=$active?>">
                                    <?php $carousel_count = $carousel_count+1; ?>
                                    <div class="row carousel-item-row">
                                        <?php $post_count=0; 
                                        for($i=$k; $i<count($cat_related_posts); $i++){ ?>

                                            <?php if($post_count < 3){ ?>
                                                <div class="col-sm-4 col-md-4">
                                                    <div class="row related-post-card related-post-card-desktop" style="cursor: pointer;" onclick="window.location.href='<?php echo get_permalink($cat_related_posts[$i]->ID);?>';" blog-title="<?=$cat_related_posts[$i]->post_title;?>">
                                                        <div class="col-sm-12 related-post-card-img-section">
                                                            <?php
                                                                $img_id             =   get_post_thumbnail_id($cat_related_posts[$i]->ID);
                                                                $img_url            =   getPostFeaturedImage($cat_related_posts[$i]->ID);
                                                                $optimized_img_url  =   getPostOptimizedImage($cat_posts[0]->ID);
                                                                if($optimized_img_url != ''){
                                                                    $img_url        = $optimized_img_url;
                                                                }
                                                                $img_alt            =   get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                                                                if($img_alt == ''){
                                                                    $img_alt = 'Blog Feature Image';
                                                                }
                                                            ?>
                                                            <img class="related-post-card-img" src="<?= $img_url ?>" alt="<?=$img_alt?>" loading="lazy" height="200" width="425">
                                                        </div>
                                                        <div class="col-sm-12 related-post-card-title">
                                                            <a class="other-post-title-txt"><h5 style="margin-top: 0px; margin-bottom:0px; line-height:1.42 !important;"><?=$cat_related_posts[$i]->post_title;?></h5></a>
                                                        </div>
                                                        <div class="col-sm-12 read-time-section post-page-read-time-section">
                                                            <div class="watch-icon-section post-page-watch-section">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                                                    <path d="M5 1.71429V0H10V1.71429H5ZM6.66667 11.1429H8.33333V6H6.66667V11.1429ZM7.5 18C6.47222 18 5.50333 17.7963 4.59333 17.3889C3.68333 16.9814 2.88833 16.428 2.20833 15.7286C1.52778 15.0286 0.989445 14.2106 0.593334 13.2746C0.197223 12.3386 -0.000554388 11.3423 1.16713e-06 10.2857C1.16713e-06 9.22857 0.198057 8.232 0.594168 7.296C0.990279 6.36 1.52833 5.54229 2.20833 4.84286C2.88889 4.14286 3.68417 3.58914 4.59417 3.18171C5.50417 2.77429 6.47278 2.57086 7.5 2.57143C8.36111 2.57143 9.1875 2.71429 9.97917 3C10.7708 3.28571 11.5139 3.7 12.2083 4.24286L13.375 3.04286L14.5417 4.24286L13.375 5.44286C13.9028 6.15714 14.3056 6.92143 14.5833 7.73571C14.8611 8.55 15 9.4 15 10.2857C15 11.3429 14.8019 12.3394 14.4058 13.2754C14.0097 14.2114 13.4717 15.0291 12.7917 15.7286C12.1111 16.4286 11.3158 16.9823 10.4058 17.3897C9.49583 17.7971 8.52722 18.0006 7.5 18ZM7.5 16.2857C9.11111 16.2857 10.4861 15.7 11.625 14.5286C12.7639 13.3571 13.3333 11.9429 13.3333 10.2857C13.3333 8.62857 12.7639 7.21429 11.625 6.04286C10.4861 4.87143 9.11111 4.28571 7.5 4.28571C5.88889 4.28571 4.51389 4.87143 3.375 6.04286C2.23611 7.21429 1.66667 8.62857 1.66667 10.2857C1.66667 11.9429 2.23611 13.3571 3.375 14.5286C4.51389 15.7 5.88889 16.2857 7.5 16.2857Z" fill="#3F3F57"/>
                                                                </svg>
                                                            </div>
                                                            <?php if( function_exists('get_readtime_of_post') ){ ?>
                                                                <div class="read-time-txt post-page-read-time-txt"><?= get_readtime_of_post($cat_related_posts[$i]->ID); esc_html_e('min read', 'veen'); ?></div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-sm-12 related-articles-read-more-section">
                                                            <a class="related-articles-read-more-txt">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $post_count++; ?>
                                            <?php }?>

                                        <?php } ?>

                                        <?php $k=$post_count+$k; ?>
                                    </div>
                                </div>
                            <?php $count++;} ?>
                        </div>
                        <div class="carousel-indicators-section">
                            <ul class="carousel-indicators">
                                <?php for($c=0; $c<$carousel_count; $c++){ 
                                    if($c == 0){
                                        $indicator_class    =   "active";
                                    }else{
                                        $indicator_class    =   "";
                                    } ?>
                                    
                                    <!-- <li data-target="#carousel-desktop" data-slide-to="<?=$c?>" class="<?=$indicator_class?>"></li> -->
                                    <li id="carousel-indicator-desktop" data-slide-to="<?=$c?>" class="carousel-indicator-desktop <?=$indicator_class?>"></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Related articles/posts section For Mobile-->
                    <div id="carousel-mob" class="col-sm-12 carousel slide related-post-mob" data-interval="false" data-ride="carousel">
                        <a class="carousel-control-prev" data-href="#carousel-mob" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
                                <g filter="url(#filter0_bd_1_10624)">
                                    <rect width="40" height="41" rx="20" transform="matrix(-1 0 0 1 48 4)" fill="white" shape-rendering="crispEdges"/>
                                    <path d="M30 18L24 24.5L30 31" stroke="#6A6A86" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <filter id="filter0_bd_1_10624" x="-92" y="-96" width="240" height="241" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="50"/>
                                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1_10624"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="4"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.521569 0 0 0 0 0.478431 0 0 0 0 0.670588 0 0 0 0.08 0"/>
                                    <feBlend mode="normal" in2="effect1_backgroundBlur_1_10624" result="effect2_dropShadow_1_10624"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1_10624" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>
                        </a>
                        <a class="carousel-control-next" data-href="#carousel-mob" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
                                <g filter="url(#filter0_bd_1_10620)">
                                    <rect x="8" y="4" width="40" height="41" rx="20" fill="white" shape-rendering="crispEdges"/>
                                    <path d="M26 18L32 24.5L26 31" stroke="#6A6A86" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <filter id="filter0_bd_1_10620" x="-92" y="-96" width="240" height="241" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="50"/>
                                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1_10620"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="4"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.521569 0 0 0 0 0.478431 0 0 0 0 0.670588 0 0 0 0.08 0"/>
                                    <feBlend mode="normal" in2="effect1_backgroundBlur_1_10620" result="effect2_dropShadow_1_10620"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1_10620" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>
                        </a>
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $k = 0; $count=0; $carousel_count_mob=0;
                            while($k<count($cat_related_posts)){ ?>
                                <?php 
                                    if($count==0){
                                        $active = 'active';
                                    }else{
                                        $active = '';
                                    }  
                                ?>
                                <div class="item <?=$active?>">
                                    <?php $carousel_count_mob = $carousel_count_mob+1; ?>
                                    <div class="row carousel-item-row">
                                        <?php $post_count=0; 
                                        for($i=$k; $i<count($cat_related_posts); $i++){ ?>

                                            <?php if($post_count < 2){ ?>
                                                <div class="col-md-6 col-sm-6 col-xs-6 related-post-card-<?=$post_count?>">
                                                    <div class="row related-post-card related-post-card-mob" style="cursor: pointer;" onclick="window.location.href='<?php echo get_permalink($cat_related_posts[$i]->ID);?>';" blog-title="<?=$cat_related_posts[$i]->post_title;?>">
                                                        <div class="col-xs-12 related-post-card-img-section">
                                                            <?php 
                                                                $img_id     =   get_post_thumbnail_id($cat_related_posts[$i]->ID);
                                                                $img_alt    =   get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                                                                $img_url            =   getPostFeaturedImage($cat_related_posts[$i]->ID);
                                                                $optimized_img_url  =   getPostOptimizedImage($cat_posts[0]->ID);
                                                                if($optimized_img_url != ''){
                                                                    $img_url        = $optimized_img_url;
                                                                }
                                                                if($img_alt == ''){
                                                                    $img_alt = 'Blog Feature Image';
                                                                }
                                                            ?>
                                                            <img class="related-post-card-img" src="<?= $img_url ?>" loading="lazy" alt="<?=$img_alt?>" height="200" width="425">
                                                        </div>
                                                        <div class="col-xs-12 related-post-card-title">
                                                            <a class="related-post-title-txt"><?=$cat_related_posts[$i]->post_title;?></a>
                                                        </div>
                                                        <div class="col-xs-12 read-time-section post-page-read-time-section">
                                                            <div class="watch-icon-section post-page-watch-section">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                                                    <path d="M5 1.71429V0H10V1.71429H5ZM6.66667 11.1429H8.33333V6H6.66667V11.1429ZM7.5 18C6.47222 18 5.50333 17.7963 4.59333 17.3889C3.68333 16.9814 2.88833 16.428 2.20833 15.7286C1.52778 15.0286 0.989445 14.2106 0.593334 13.2746C0.197223 12.3386 -0.000554388 11.3423 1.16713e-06 10.2857C1.16713e-06 9.22857 0.198057 8.232 0.594168 7.296C0.990279 6.36 1.52833 5.54229 2.20833 4.84286C2.88889 4.14286 3.68417 3.58914 4.59417 3.18171C5.50417 2.77429 6.47278 2.57086 7.5 2.57143C8.36111 2.57143 9.1875 2.71429 9.97917 3C10.7708 3.28571 11.5139 3.7 12.2083 4.24286L13.375 3.04286L14.5417 4.24286L13.375 5.44286C13.9028 6.15714 14.3056 6.92143 14.5833 7.73571C14.8611 8.55 15 9.4 15 10.2857C15 11.3429 14.8019 12.3394 14.4058 13.2754C14.0097 14.2114 13.4717 15.0291 12.7917 15.7286C12.1111 16.4286 11.3158 16.9823 10.4058 17.3897C9.49583 17.7971 8.52722 18.0006 7.5 18ZM7.5 16.2857C9.11111 16.2857 10.4861 15.7 11.625 14.5286C12.7639 13.3571 13.3333 11.9429 13.3333 10.2857C13.3333 8.62857 12.7639 7.21429 11.625 6.04286C10.4861 4.87143 9.11111 4.28571 7.5 4.28571C5.88889 4.28571 4.51389 4.87143 3.375 6.04286C2.23611 7.21429 1.66667 8.62857 1.66667 10.2857C1.66667 11.9429 2.23611 13.3571 3.375 14.5286C4.51389 15.7 5.88889 16.2857 7.5 16.2857Z" fill="#3F3F57"/>
                                                                </svg>
                                                            </div>
                                                            <?php if( function_exists('get_readtime_of_post') ){ ?>
                                                                <div class="read-time-txt post-page-read-more-txt"><?= get_readtime_of_post($cat_related_posts[$i]->ID); esc_html_e('min read', 'veen'); ?></div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-xs-12 related-articles-read-more-section">
                                                            <a class="related-articles-read-more-txt">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $post_count++; ?>
                                            <?php } ?>

                                        <?php } ?>

                                        <?php $k=$post_count+$k; ?>
                                    </div>
                                </div>
                            <?php $count++;} ?>
                        </div>
                        <div class="carousel-indicators-section">
                            <ul class="carousel-indicators">
                                <?php for($c=0; $c<$carousel_count_mob; $c++){ 
                                    if($c == 0){
                                        $indicator_class    =   "active";
                                    }else{
                                        $indicator_class    =   "";
                                    } ?>
                                    <!-- <a class="carousel-indicator-mob" data-slide-to="<?=$c?>"><li class="<?=$indicator_class?>"></li></a> -->
                                    <li id="carousel-indicator-mob" data-slide-to="<?=$c?>" class="carousel-indicator-mob <?=$indicator_class?>"></li>
                                    
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Delayed toast to display message while user will copy page url -->
        <div class="container copy-btn-toast hidden" id="copy-btn-toast">
            <div class="row custom-toast-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 copy-btn-toast-body">
                    <div class="row">
                        <div class="col-sm-10 col-xs-10" style="display: flex;">
                            <svg class="toast-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M9.58862 13.1856C9.66728 13.264 9.72969 13.3572 9.77227 13.4597C9.81486 13.5623 9.83678 13.6722 9.83678 13.7833C9.83678 13.8943 9.81486 14.0043 9.77227 14.1069C9.72969 14.2094 9.66728 14.3026 9.58862 14.381L9.17096 14.7986C8.37954 15.59 7.30614 16.0346 6.1869 16.0346C5.06766 16.0346 3.99426 15.59 3.20284 14.7986C2.41141 14.0072 1.9668 12.9338 1.9668 11.8145C1.9668 10.6953 2.41141 9.62191 3.20284 8.83049L4.89877 7.13525C5.65919 6.37295 6.6823 5.93025 7.75854 5.89783C8.83478 5.86542 9.88268 6.24573 10.6876 6.96088C10.7707 7.03475 10.8384 7.12426 10.887 7.22431C10.9355 7.32435 10.9638 7.43298 10.9703 7.54397C10.9768 7.65497 10.9614 7.76616 10.925 7.8712C10.8886 7.97625 10.8318 8.07309 10.7579 8.15619C10.684 8.23929 10.5945 8.30703 10.4945 8.35554C10.3944 8.40405 10.2858 8.43237 10.1748 8.4389C10.0638 8.44543 9.95263 8.43003 9.84759 8.39359C9.74254 8.35715 9.6457 8.30037 9.5626 8.2265C9.07992 7.79783 8.45169 7.56977 7.80642 7.58898C7.16114 7.6082 6.5476 7.87323 6.09127 8.32986L4.39674 10.023C3.92196 10.4978 3.65524 11.1417 3.65524 11.8131C3.65524 12.4846 3.92196 13.1285 4.39674 13.6033C4.87152 14.0781 5.51546 14.3448 6.1869 14.3448C6.85834 14.3448 7.50228 14.0781 7.97705 13.6033L8.39471 13.1856C8.47307 13.1072 8.56613 13.045 8.66856 13.0025C8.77099 12.96 8.88078 12.9382 8.99166 12.9382C9.10255 12.9382 9.21234 12.96 9.31477 13.0025C9.4172 13.045 9.51025 13.1072 9.58862 13.1856ZM14.7974 3.20127C14.0053 2.41106 12.9321 1.96729 11.8133 1.96729C10.6945 1.96729 9.62131 2.41106 8.82924 3.20127L8.41159 3.61892C8.25308 3.77743 8.16403 3.99242 8.16403 4.21658C8.16403 4.44074 8.25308 4.65573 8.41159 4.81424C8.57009 4.97274 8.78508 5.06179 9.00924 5.06179C9.23341 5.06179 9.44839 4.97274 9.6069 4.81424L10.0246 4.39658C10.4993 3.9218 11.1433 3.65507 11.8147 3.65507C12.4861 3.65507 13.1301 3.9218 13.6049 4.39658C14.0796 4.87136 14.3464 5.5153 14.3464 6.18674C14.3464 6.85817 14.0796 7.50211 13.6049 7.97689L11.9096 9.67283C11.4529 10.1293 10.839 10.3939 10.1936 10.4126C9.54815 10.4313 8.91997 10.2026 8.4376 9.77338C8.3545 9.69951 8.25766 9.64273 8.15262 9.60629C8.04757 9.56984 7.93638 9.55445 7.82538 9.56098C7.71439 9.5675 7.60577 9.59583 7.50572 9.64434C7.40567 9.69285 7.31616 9.76059 7.24229 9.84369C7.16842 9.92679 7.11164 10.0236 7.0752 10.1287C7.03876 10.2337 7.02336 10.3449 7.02989 10.4559C7.03642 10.5669 7.06474 10.6755 7.11325 10.7756C7.16176 10.8756 7.2295 10.9651 7.3126 11.039C8.11696 11.754 9.16416 12.1345 10.2399 12.1028C11.3156 12.071 12.3385 11.6293 13.0993 10.8681L14.7953 9.17291C15.5864 8.38103 16.031 7.30758 16.0313 6.18823C16.0317 5.06887 15.5879 3.99511 14.7974 3.20267V3.20127Z" fill="#5322FF"/>
                            </svg>
                            <p class="link-copied-txt">Link copied</p>
                        </div>
                        <div class="col-sm-2 col-xs-2 toast-cross-btn">
                            <a class="toast-close-btn">
                                <svg class="toast-svg" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_2311_68771)">
                                        <path d="M6.17476 6.99996L1.16639 12.0083C0.938579 12.2361 0.938579 12.6055 1.16638 12.8333C1.39419 13.0611 1.76354 13.0611 1.99134 12.8333L6.99972 7.82492L12.0081 12.8333C12.2359 13.0611 12.6052 13.0611 12.8331 12.8333C13.0609 12.6055 13.0609 12.2361 12.8331 12.0083L7.82468 6.99996L12.8331 1.99159C13.0609 1.76378 13.0609 1.39444 12.8331 1.16663C12.6052 0.938823 12.2359 0.938824 12.0081 1.16663L6.99972 6.175L1.99134 1.16663C1.76354 0.938824 1.39419 0.938824 1.16639 1.16663C0.938579 1.39444 0.93858 1.76378 1.16639 1.99159L6.17476 6.99996Z" fill="#A9A9AE" stroke="#A9A9AE" stroke-width="0.5"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2311_68771">
                                        <rect width="14" height="14" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>

    </main>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no post was found!</p>
      </article>
<?php endif; ?>
<?php get_footer('new-blog'); ?>