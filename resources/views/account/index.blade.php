@extends('base')
@section("title", "Account")
@section("content")

    <div class="account full-width flex">

        <main class="flex-space align-start">

            <div class="full-width">
                <div class="row gutters no-padding no-margin full-width main-card flex-space">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 no-padding left-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="img-circle text-center mb-3 mt-1">
                                            <img src="static/image/user/1.png">
                                        </div>
                                        <h5 class="user-name">
                                            {{ substr(explode(" ", Session::get("user")->username)[0], 0, 15) }}
                                        </h5>
                                        <h5 class="user-email full-width over-hide">
                                            {{ substr(Session::get("user")->email, 0, 35) }}
                                        </h5>
                                    </div>
                                    <div class="flex-column nav-pills">
                                        <a class="nav-link full-width flex-start border-top show-div pointer" id="account-div" data-toggle="pill" role="tab" aria-controls="account" aria-selected="true">
                                            <i class="fa fa-home text-center"></i> 
                                            Account Information
                                        </a>
                                        <a class="nav-link full-width flex-start border-top show-div pointer" id="password-div" data-toggle="pill"  role="tab" aria-controls="password" aria-selected="false">
                                            <i class="fa fa-key text-center"></i> 
                                            Password
                                        </a>
                                        <a class="nav-link full-width flex-start border-top show-div pointer" id="notification-div" data-toggle="pill" role="tab" aria-controls="notification" aria-selected="false">
                                            <i class="fa fa-bell text-center"></i> 
                                            Notification
                                        </a>
                                        <a class="nav-link full-width flex-start border-top show-div pointer" id="payment-div" data-toggle="pill" role="tab" aria-controls="notification" aria-selected="false">
                                            <i class="fa fa-credit-card text-center"></i> 
                                            Payment Methods
                                        </a>
                                        <a href="/bookings" class="nav-link full-width flex-start border-top pointer" data-toggle="pill" role="tab" aria-controls="notification" aria-selected="false">
                                            <i class="fa fa-ticket text-center"></i> 
                                            All Bookings
                                        </a>
                                        <a class="nav-link full-width flex-start border-top show-div pointer" id="setting-div" data-toggle="pill" role="tab" aria-controls="notification" aria-selected="false">
                                            <i class="fa fa-cog text-center"></i> 
                                            Site Settings
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 no-padding right-card">
                        <div class="card">
                            <div class="card-body account-div">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary left-text">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="name" 
                                            value="{{ Session::get('user')->username }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" name="email"
                                            value="{{ Session::get('user')->email }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                            value="{{ Session::get('user')->phone }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Website URL</label>
                                            <input type="url" class="form-control" id="website" name="url" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="mt-3 mb-2 text-primary left-text p">Address</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Street">Street</label>
                                            <input type="name" class="form-control" name="street" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="ciTy">City</label>
                                            <input type="name" class="form-control" name="city" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sTate">State</label>
                                            <input type="text" class="form-control" name="state" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="zIp">Zip Code</label>
                                            <input type="text" class="form-control"name="zip" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters button-div">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right buttons">
                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-secondary">Cancel</button>
                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body password-div hide">
                                <div class="tab-pane">
                                    <h3 class="mb-4">Password Settings</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old password</label>
                                                <input type="password" class="form-control" name="old-password" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New password</label>
                                                <input type="password" class="form-control" name="password1" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm new password</label>
                                                <input type="password" class="form-control" name="password2" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters button-div">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right buttons">
                                                <button type="button" class="btn btn-secondary cancel">Cancel</button>
                                                <button type="button" class="btn btn-primary update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body notification-div hide">
                                <div class="tab-pane">
                                    <h3 class="mb-4">Notification Settings</h3>
                                    <div class="form-group">
                                        <div class="form-check pointer">
                                            <input class="form-check-input pointer" type="checkbox" value="" id="notification1">
                                            <label class="form-check-label pointer" for="notification1">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check pointer">
                                            <input class="form-check-input pointer" type="checkbox" value="" id="notification2" >
                                            <label class="form-check-label pointer" for="notification2">
                                                hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check pointer">
                                            <input class="form-check-input pointer" type="checkbox" value="" id="notification3" >
                                            <label class="form-check-label pointer" for="notification3">
                                                commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row gutters button-div">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right buttons">
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-secondary">Cancel</button>
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body payment-div hide">
                                <div class="tab-pane">
                                    <h3 class="mb-3">Payment Methods</h3>
                                    <div class="form-group">
                                        <p class="form-check no-padding" for="notification3">
                                            your stored cards
                                        </p>
                                    </div>
                                    <div class="alert alert-danger flex-start">
                                        To view your stored cards, please <a href="/login" class="pr-2 pl-2">log in</a> again.
                                    </div>
                                    <div class="row gutters button-div">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right buttons">
                                                <button type="button" class="btn btn-secondary remove">Remove All</button>
                                                <button type="button" class="btn btn-primary add">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body setting-div hide">

                                <div class="tab-pane">

                                    <h3 class="mb-2">Settings</h3>

                                </div>

                            </div>
                            <div class="back absolute flex pointer hide" title="Back">
                                <span class="material-symbols-outlined go-icon">arrow_circle_left</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Account</a>
                
                <i class="fa fa-angle-right"></i>
    
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script>
        $("header").remove();
        $(".nav-side .side .profile0").addClass("active");
    </script>

@endsection