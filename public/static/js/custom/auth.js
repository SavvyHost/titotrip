let IP, COUNTRY, LANGUAGE;

function set_ip () {

    $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {

        data = data.trim().split('\n').reduce(function(obj, pair) {

            pair = pair.split('=');

            return obj[pair[0]] = pair[1], obj;

        }, {});

        IP = data['ip'];
        COUNTRY = data.loc;
        LANGUAGE = window.navigator.userLanguage || window.navigator.language || window.navigator.language.split("-")[0];

    });

}
function Clicks () { 

    $(".register-form.form1").on("click", ".input", function(){
    
        $(".register-form.form1 .input").each(function(){
            if ( ! $(this).find("input").val() ) $(this).removeClass("active1")
        });
        $(this).addClass("active1").find("input").focus()

    });
    $(".register-form.form2").on("click", "input", function(){
    
        $(".register-form.form2 .input").each(function(){ $(this).removeClass("active3"); });

        $(this).parents(".input").addClass("active3").find("input").focus()

    
    });
    $(document).on("click", function(e){
    
        if ( ! Check_Class(e.target, "input") ) {
    
            $(e.target).find(".input").removeClass("active3");
    
            if ( ! $(e.target).find("input").val() ) $(e.target).find(".input").removeClass("active1");
    
        }
    
    });
    $("form .input input").keyup(function(){
        if ( $(this).val() ) {
            $(this).parents(".input").removeClass("error-input");
            $(`form .${$(this).attr("name")}-error`).hide();
        }
        else {
            $(this).parents(".input").addClass("error-input");
            $(`form .${$(this).attr("name")}-error`).text("Fill out the field !").css("display", "flex");
        }
    });
    
    $(".logout").click(function(){
        Logout();
    });

}
function Logout(){

    $.ajax({
        url: "/actions",
        method: "POST",
        data: {},
        headers: {
            "request": "logout",
            'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
        },
        success: () => {
            window.location.href = "/";
        },
        error: () => {}
    });

}
function Register () {

    const Submit = _ => {

        let username = $("form .input .username").val();
        let email = $("form .input .email").val();
        let password = $("form .input .password").val();
        let register = true;

        if ( ! username ) {
            $("form .input .username").parents(".input").addClass("error-input");
            $(".username-error").text("Fill out the field !").css("display", "flex");
            register = false;
        }
        if ( ! email ) {
            $("form .input .email").parents(".input").addClass("error-input");
            $(".email-error").text("Fill out the field !").css("display", "flex");
            register = false;
        }
        if ( ! password ) {
            $("form .input .password").parents(".input").addClass("error-input");
            $(".password-error").text("Fill out the field !").css("display", "flex");
            register = false;
        }
        let data = {
            "username": username, "email": email, 
            "password": password, "register_date": Get_Date(),
            "login_date": Get_Date(), "gender": "",
            "ip": IP, "language": LANGUAGE, "country": COUNTRY,
            "phone": "", "image": ""
        };
        if ( register ) {

            $(".register-form").addClass("no-visible");
            $(".loader").css("display", "flex");

            $.ajax({
                url: "/register",
                method: "POST",
                data: data,
                headers: {
                    "request": "register",
                    'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
                },
                success: (data) => {

                    if ( data['status'] == "email" ) {
                        $(".email-error").html("<i class='fa fa-warning'></i> A user account with this email address already exists !")
                                            .css("display", "flex");
                        $(".email").parents(".input").addClass("error-input");
                        $(".register-form").removeClass("no-visible");
                    }

                    if ( data['status'] == false ) {
                        $(".register-faild").css("display", "flex");
                    }

                    if ( data['status'] == true ) window.location.href = "/";

                    $(".loader").hide();

                },
                error: () => {

                    $(".register-faild").css("display", "flex");
                    $(".register-form").removeClass("no-visible");
                    $(".loader").hide();
                    
                }
            });

        }

    }
    $(".signup-form form").on("submit", function(e){
        
        e.preventDefault();

        Submit();

    });

}
function Login () {

    const Submit = _ => {

        let email = $("form .input .email").val();
        let password = $("form .input .password").val();
        let login = true;

        if ( ! email ) {
            $("form .input .email").parents(".input").addClass("error-input");
            $(".email-error").text("Fill out the field !").css("display", "flex");
            login = false;
        }
        if ( ! password ) {
            $("form .input .password").parents(".input").addClass("error-input");
            $(".password-error").text("Fill out the field !").css("display", "flex");
            login = false;
        }
        let data = {
            "email": email, "password": password, "register_date": Get_Date(), "login_date": Get_Date(),
        };
        if ( login ) {

            $(".login-form").addClass("no-visible");
            $(".loader").css("display", "flex");

            $.ajax({
                url: "/login",
                method: "POST",
                data: data,
                headers: {
                    "request": "login",
                    'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
                },
                success: (data) => {

                    if ( data['status'] == false ) {

                        $(".login-faild").css("display", "flex");
                        $(".login-form").removeClass("no-visible");
                        $(".loader").hide();

                    }

                    if ( data['status'] == true ) window.location.href = "/";

                },
                error: () => {

                    $(".login-faild").css("display", "flex");
                    $(".login-form").removeClass("no-visible");
                    $(".loader").hide();
                    
                }
            });

        }

    }
    $(".log-form form").on("submit", function(e){
        
        e.preventDefault();

        Submit();

    });

}
function Recovery () {

    const Submit = _ => {

        let email = $("form .input .email").val();
        let change = true;

        if ( ! email ) {
            $("form .input .email").parents(".input").addClass("error-input");
            $(".email-error").text("Fill out the field !").css("display", "flex");
            change = false;
        }
        let data = {
            "email": email, "date": Get_Date(),
        };
        if ( change ) {

            $(".recovery1").addClass("no-visible");
            $(".loader").css("display", "flex");

            $.ajax({
                url: "/change-password",
                method: "POST",
                data: data,
                headers: {
                    "request": "recovery",
                    'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
                },
                success: (data) => {

                    if ( data['status'] == false ) {
                        $(".recovery-faild").css("display", "flex");
                        $(".recovery1").removeClass("no-visible");
                    }

                    if ( data['status'] == true ) {
                        $(".recovery-faild").hide();
                        $(".recovery1").hide();
                        $(".recovery").fadeIn().css("display", "flex");
                    }

                    $(".loader").hide();

                },
                error: () => {

                    $(".recovery-faild").css("display", "flex");
                    $(".recovery1").removeClass("no-visible");
                    $(".loader").hide();
                    
                }
            });

        }

    }
    $(".recovery-form form").on("submit", function(e){
        
        e.preventDefault();

        Submit();

    });
    $(".recovery .resend-password").on("click", function(){
        Submit();
    });

}
function Change () {

    const Submit = _ => {

        let pass1 = $("form .input .password1").val();
        let pass2 = $("form .input .password2").val();

        let change = true;

        if ( ! pass1 ) {
            $("form .input .password1").parents(".input").addClass("error-input");
            $(".password1-error").text("Fill out the field !").css("display", "flex");
            change = false;
        }
        else if ( ! pass2 ) {
            $("form .input .password2").parents(".input").addClass("error-input");
            $(".password2-error").text("Fill out the field !").css("display", "flex");
            change = false;
        }
        else if ( pass1 != pass2 ) {
            $(".recovery-faild").html('<i class="fa fa-warning"></i> Warn ! The two passwords must be equals .').css("display", "flex");
            change = false;
        }

        let data = {
            "password": pass1, "date": Get_Date(), "token": Query("token"),
        };
        if ( change ) {

            $(".reset-form").addClass("no-visible");
            $(".loader").css("display", "flex");

            $.ajax({
                url: "/password-recovery",
                method: "POST",
                data: data,
                headers: {
                    "request": "change_password",
                    'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
                },
                success: (data) => {

                    if ( data['status'] == false ) {

                        $(".recovery-faild")
                        .html('<i class="fa fa-warning"></i> Oops, Invalid token value ! please make sure that token id is correct .')
                        .css("display", "flex");
                        $(".reset-form").removeClass("no-visible");

                    }

                    if ( data['status'] == "exist" ) {

                        $(".recovery-faild")
                        .html('<i class="fa fa-warning"></i> Don\'t use old password, write password more security.')
                        .css("display", "flex");
                        $(".reset-form").removeClass("no-visible");

                    }

                    if ( data['status'] == true ) {

                        $(".recovery-faild").hide();
                        $(".reset-form").hide();
                        $(".success").fadeIn().css("display", "flex").removeClass("no-visible");
                        
                    }
                    
                    $(".loader").hide();

                },
                error: () => {

                    $(".recovery-faild").css("display", "flex");
                    $(".reset-form").removeClass("no-visible");
                    $(".loader").hide();
                    
                }
            });

        }

    }
    $(".reset-form form").on("submit", function(e){

        e.preventDefault();

        Submit();

    });

}
function public_log () {
    
    set_ip();
    Register();
    Login();
    Recovery();
    Change();
    Clicks();

}

public_log();