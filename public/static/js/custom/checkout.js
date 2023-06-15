
function prepare () {

    $("nav .nav-icon, nav .show-side, nav .nav-side").remove();

}
function storage_tour () {

    let tour_data = localStorage.getItem("check_out")
    if ( tour_data ) tour_data = JSON.parse(tour_data);
    else window.location.href = "/";

    $(".title").text(tour_data['title'])
    $(".tour-image").attr("src", tour_data['image'])
    $(".price, .total-price").text(tour_data['price'])
    if ( tour_data['adults'] == 1 ) $(".adults").text(`${tour_data['adults']} adult`);
    else $(".adults").text(`${tour_data['adults']} adults`);
    $(".datetime").text(`${tour_data['date']} • ${tour_data['time']}`);
    $(".cancel-datetime").text(`${tour_data['cancel_date']} • ${tour_data['cancel_time']}`);
    $(".contact-phone").text("+20 999 999 99");

}

function clicks () {

    $("form input").keyup(function(){
        if ( $(this).val() ) {
            $(this).parents(".formInput__2IHK").removeClass("error");
        }
        else {
            $(this).parents(".formInput__2IHK").addClass("error");
        }
    });
    $(".promo-code input").keyup(function(){
        $(this).parents(".formInput__2IHK").removeClass("error");
    });
    $(".contact-info .edit-contact").click(function(){
        $(".payment-div").hide();
        $(".details-div").hide();
        $(".contact-div").show();
        $(window).scrollTop(0);
    });
    $(".details-info .edit-details").click(function(){
        $(".payment-div").hide();
        $(".contact-div").hide();
        $(".details-div").show();
        $(window).scrollTop(Position(".details-div .details-information", "top") - 80);
    });
    $(".icons").on("click", ".contact-icon.active", function(){
        $(".payment-div").hide();
        $(".details-div").hide();
        $(".contact-div").show();
        $(window).scrollTop(0);
        $(".icons .contact-icon").addClass("opened").removeClass("none active");
        $(".icons .details-icon").addClass("none").removeClass("opened active");
        $(".icons .payment-icon").addClass("none").removeClass("opened active");
    });
    $(".icons").on("click", ".details-icon.active", function(){
        $(".payment-div").hide();
        $(".contact-div").hide();
        $(".details-div").show();
        $(window).scrollTop(Position(".details-div .details-information", "top") - 80);
        $(".icons .details-icon").addClass("opened").removeClass("none active");
        $(".icons .contact-icon").addClass("active").removeClass("opened none");
        $(".icons .payment-icon").addClass("none").removeClass("opened active");
    });
    $(".credit-payment").click(function(){
        $(".checkoutAccordionItemHeader__G5v8").each(function(){
            $(this).find(".dummyRadioButton__3s4A").removeClass("checked__RrLR");
        });
        $(this).find(".dummyRadioButton__3s4A").addClass("checked__RrLR");
        $(".container__3RER form .buttons a").hide();
        $(".container__3RER form .buttons .pay-button").show();
    });
    $(".paypal-payment").click(function(){
        $(".checkoutAccordionItemHeader__G5v8").each(function(){
            $(this).find(".dummyRadioButton__3s4A").removeClass("checked__RrLR");
        });
        $(this).find(".dummyRadioButton__3s4A").addClass("checked__RrLR");
        $(".container__3RER form .buttons a").hide();
        $(".container__3RER form .buttons .paypal-button").show();
    });
    $(".paylater-payment").click(function(){
        $(".checkoutAccordionItemHeader__G5v8").each(function(){
            $(this).find(".dummyRadioButton__3s4A").removeClass("checked__RrLR");
        });
        $(this).find(".dummyRadioButton__3s4A").addClass("checked__RrLR");
        $(".container__3RER form .buttons a").hide();
        $(".container__3RER form .buttons .paylater-button").show();
    });
    $(".promo-code-button").click(function(){
        $(this).hide();
        $(this).parents(".promo-code").find(".check-promo").css("display", "flex");
        $(this).parents(".promo-code").find(".check-promo input").val("");
        $(this).parents(".promo-code").find(".check-promo").children().removeClass("error");
    });
    $(".show-top-side").click(function(){
        $(".check-promo").hide();
        $(".promo-code-button").show();
        $(".top-side").fadeIn(150);
    });
    $(".close-top-side").click(function(){
        $("html").css("scroll-behavior", "auto");
        $(window).scrollTop(55);
        $(".top-side").fadeOut(200);
        $("html").css("scroll-behavior", "smooth");
    });
    $(window).on("resize load scroll", function(){
        if ( $(window).width() < 1025 ) {
            $("nav").css("position", "static");
            $(".space-nav").hide();
            $(".checkout").css("width", "100%");
            if ( $(window).scrollTop() > 55 ) {
                $(".checkout .show-top-side").css("position", "fixed");
                $(".space-button").show();
            }
            else {
                $(".checkout .show-top-side").css("position", "static");
                $(".space-button").hide();
            }
        }
        else {
            $("nav").css("position", "fixed");
            $(".space-nav").show();
            $(".top-side").hide();
        }
    });
    
}
function promo_code () {

    const check_promo = _ => {

        let code = $(_.target).parents(".promo-code").find("input").val().trim();
        if ( ! code ) return true;
        $(".promo-code .apply").addClass("none-button");

        $.ajax({
			url: "/actions",
			method: "POST",
			data: {"code": code},
			headers: {
				"request": "promo_code",
				'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
			},
			success: (data) => {
				
                if ( !data['status'] ) $(".promo-code .formInput__2IHK").addClass("error");
                else {
                    $(".discounts__1Mi3").remove();
                    $(".checkout .total-price, .checkout .price").text(`$${parseFloat(data['new_price']).toFixed(2)}`);
                }
                $(".promo-code .apply").removeClass("none-button");

			},
			error: () => {
                $(".promo-code .formInput__2IHK").addClass("error");
            }
		});
        
    }

    $('.promo-code .apply:not(.none)').click(check_promo);

}
function steps () {

    const contact = _ => {

        let firstname = $(".contact-div .formInput__2IHK input[name='firstname']").val();
        let lastname = $(".contact-div .formInput__2IHK input[name='lastname']").val();
        let email = $(".contact-div .formInput__2IHK input[name='email']").val();
        let country_code = $(".contact-div .formInput__2IHK select[name='country-code']").val();
        let phone = $(".contact-div .formInput__2IHK input[name='phone']").val();
        let next_step = true;

        if ( !firstname ) {
            $(".contact-div .formInput__2IHK input[name='firstname']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !lastname ) {
            $(".contact-div .formInput__2IHK input[name='lastname']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !email ) {
            $(".contact-div .formInput__2IHK input[name='email']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !country_code ) {
            $(".contact-div .formInput__2IHK select[name='country-code']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !phone ) {
            $(".contact-div .formInput__2IHK input[name='phone']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( next_step ) {
            
            $(".contact-info .username").text(`${firstname} ${lastname}`);
            $(".contact-info .email").text(email);
            $(".contact-info .phone").text(`${country_code}${phone}`);

            $(".icons .contact-icon").removeClass("opened").addClass("active");
            $(".icons .details-icon").addClass("opened").removeClass("none");
            $(".contact-div").hide();
            $(".details-div").show();
            $(window).scrollTop(Position(".details-div .details-information", "top") - 80);

        }

    }
    const details = _ => {

        let firstname = $(".details-div .formInput__2IHK input[name='firstname']").val();
        let lastname = $(".details-div .formInput__2IHK input[name='lastname']").val();
        let pick_up = $(".details-div .formInput__2IHK select[name='pick-up']").val();
        let language = $(".details-div .formInput__2IHK select[name='language']").val();
        let requirements = $(".details-div .formInput__2IHK input[name='requirements']").val();
        let next_step = true;

        if ( !firstname ) {
            $(".details-div .formInput__2IHK input[name='firstname']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !lastname ) {
            $(".details-div .formInput__2IHK input[name='lastname']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !pick_up ) {
            $(".details-div .formInput__2IHK select[name='pick_up']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( !language ) {
            $(".details-div .formInput__2IHK select[name='language']").parents(".formInput__2IHK").addClass("error");
            next_step = false;
        }
        if ( next_step ) {
            
            $(".details-info .travelers div").text(`${firstname} ${lastname}`);
            $(".details-info .pick-up").text($(`.details-div .formInput__2IHK select[name='pick-up'] option[value='${pick_up}']`).text());
            $(".details-info .tour-lang").text($(`.details-div .formInput__2IHK select[name='language'] option[value='${language}']`).text());

            $(".icons .contact-icon").removeClass("opened").removeClass("none").addClass("active");
            $(".icons .details-icon").removeClass("opened").removeClass("none").addClass("active");
            $(".icons .payment-icon").addClass("opened");
            $(".contact-div").hide();
            $(".details-div").hide();
            $(".payment-div").show();
            $(window).scrollTop(Position(".payment-div .payment-information", "top") - 80);

        }

    }

    $(".contact-div button.next").click(contact);
    $(".details-div button.next").click(details);

}
function pay () {

    const set_book_data = _ => {

        let username = $(".contact-info .username").first().text().trim();
        let email = $(".contact-info .email").first().text().trim();
        let phone = $(".contact-info .phone").first().text().trim();
        let primary_traveler = $(".details-info .travelers div").first().text().trim();
        let pick_up = $(".details-div .formInput__2IHK select[name='pick-up']").val();
        let tour_language = $(".details-div .formInput__2IHK select[name='language']").val();
        let requirements = $(".details-div .formInput__2IHK input[name='requirements']").val();

        let data = {
            "username": username, "email": email, "phone": phone, "primary_traveler": primary_traveler,
            "pick_up": pick_up, "language": tour_language, "requirements": requirements,
            "storate_data": JSON.parse(localStorage.getItem("check_out")),
        }

        return data;

    }
    const paynow = _ => {

        let data = set_book_data();

    }
    const paypal = _ => {

        let data = set_book_data();

    }
    const paylater = _ => {

        let data = set_book_data();

    }

    $(".pay-button").click(paynow);
    $(".paypal-button").click(paypal);
    $(".paylater-button").click(paylater);

}
function check_public () {

    prepare();
    storage_tour();
    clicks();
    steps();
    pay();
    promo_code();

}

check_public();