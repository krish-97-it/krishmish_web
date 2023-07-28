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
                        <div class="col-sm-12 profile-field">
                            <label>Contact Number:</label>&nbsp;<button type="button" class="btn mob-no-change hidden">Change<span class="glyphicon glyphicon-pencil"></span></button>
                            <input type="tel" name="user-info-phone" class="form-control user-info-p user-info-phone" readonly="readonly" onchange="CUSTOM_FUNCTIONS.phoneValidation(this)" onblur="CUSTOM_FUNCTIONS.phoneValidation(this)" maxlength="10">
                        </div>
                        <div class="col-sm-12 profile-field new-phone-field hidden">
                            <label>Add New Phone Number:</label>
                            <input type="tel" name="user-info-new-phone" class="form-control user-info-input user-info-new-phone" onchange="CUSTOM_FUNCTIONS.optionalPhoneValidation(this,'true')" onblur="CUSTOM_FUNCTIONS.optionalPhoneValidation(this,'true')" maxlength="10">
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
