<!-- header-navigation bar collapsable -->
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            </div>
        </div>
    </nav>

    
    <div class="modal fade" id="signUpModal" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <!-- Modal header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create Your Account</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">    
                            <div class="item registe-page">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group name-form-group" data-name-field="">
                                            <div><label>Full Name</label><span class="required-asterisk">*</span></div>
                                            <input id="fullName" name="user-name" class="form-control" type="text" placeholder="Name" onchange="COLLEGE_BRANCH_PREDICTOR.nameValidation(this)" onblur="COLLEGE_BRANCH_PREDICTOR.nameValidation(this)" value="" autocomplete="off" maxlength="245"  required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group name-form-group" data-name-field="">
                                            <div><label>Phone</label><span class="required-asterisk">*</span></div>
                                            <input id="userPhone" name="user-phone" class="form-control" type="tel" pattern="[789][0-9]{9}" placeholder="Phone No." onchange="COLLEGE_BRANCH_PREDICTOR.phoneValidation(this)" onblur="COLLEGE_BRANCH_PREDICTOR.phoneValidation(this)" value="" autocomplete="off" maxlength="10" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group name-form-group" data-name-field="">
                                            <div><label>Email</label><span class="required-asterisk">*</span></div>
                                            <input id="email-id" name="user-email" class="form-control" type="text" placeholder="Email-id" onchange="COLLEGE_BRANCH_PREDICTOR.emailValidation(this,'true')" onblur="COLLEGE_BRANCH_PREDICTOR.emailValidation(this,'true')" value="" autocomplete="off" maxlength="245" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group name-form-group" data-name-field="">
                                            <div><label>Address</label><span class="required-asterisk">*</span></div>
                                            <input id="address" name="user-address" class="form-control" type="text" placeholder="Address" onchange="COLLEGE_BRANCH_PREDICTOR.basicRequiredValidation(this,'','Address')" onblur="COLLEGE_BRANCH_PREDICTOR.basicRequiredValidation(this,'','Address')" value="" autocomplete="off" maxlength="245" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12 expected-percentile-btn" style="text-align:center; margin-top: 20px;">
                                        <button type="button" class="btn" style="background-color:purple; color:white; padding:6px 20px !important;" data-search-btn>Register Now</button>
                                    </div>
                                    <div class="col-md-12" style="color:red; text-align: center; font-weight:600;">
                                        <span show-error-msg-two></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn" style="background-color:#0a9f06; color:white; padding:6px 20px !important;" data-view-full-list>Already Have an Account?</button>
                        <button type="button" class="btn" style="background-color:red; color:white; padding:6px 20px !important;" data-clear-btn>Clear</button>
                        </div>

                    </div>
                </div>
            </div>
</header>
