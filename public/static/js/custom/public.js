

const bannerItem = new Swiper(".header-swiper", {

    slidesPerGroup: 1,
    loop: false,
    speed: 400,
    effect: "fade",
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".header-pagination",
        clickable: true,
    },
});

const featuredItem = new Swiper(".swiper-featured", {
    direction: "horizontal",
    spaceBetween: 10,
    autoplay: {
        delay: 6000,
        disableOnInteraction: true,
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

function new_swiper(el_slider, pagination, swiper_pagination, slides=1, space=0, group=1, breaks=false){

    let points = {};

    if ( breaks == 1 ) {

        points = {
            '@0.00': { slidesPerView: 1.2 },
            '@0.50': { slidesPerView: 1.2 },
            '@0.75': { slidesPerView: 2.2 },
            '@1.50': { slidesPerView: 3.3 },
            '@2.00': { slidesPerView: 4 },
        };

    }

    else if ( breaks == 2 ) {
        points = {
            '@0.00': { slidesPerView: 1.2 },
            '@0.50': { slidesPerView: 1.2 },
            '@0.75': { slidesPerView: 2.2 },
            '@1.50': { slidesPerView: 3 },
            '@2.00': { slidesPerView: 4 },
        };
    }

    // new Swiper ()



    new Swiper(el_slider, {
        slidesPerView: slides,
        spaceBetween: space,
        slidesPerGroup: group,
        loop: false,
        speed: 400,
        effect: "slide",
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: pagination,
            clickable: true,
            renderBullet: function (index) { return swiper_pagination },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: points,
    });

}
function calendar(years_num) {

	const set_days = (first_day, num_days, month, year) => {

		$(".calendar .list-days ul").each(function(){ $(this).html(""); });

		var current_list = 0; today = 0;

		for ( let ch = 0; ch < num_days; ch++ ) {

			if ( ch % 7 == 0 ) current_list++;

			if ( ch < first_day ) {
                $(`.calendar .list-days #days_${current_list}`).append(`<li class="no-visible">0</li>`);
                num_days++;
            }
			else {

                today++;

				if ( today < parseInt(Get_Date("day")) && month == parseInt(Get_Date("month")) && year == parseInt(Get_Date("year")) )
					$(`.calendar .list-days #days_${current_list}`).append(`<li class="none">${today}</li>`);
				else if ( today == parseInt(Get_Date("day")) && month == parseInt(Get_Date("month")) && year == parseInt(Get_Date("year")) )
					$(`.calendar .list-days #days_${current_list}`).append(`<li class="active">${today}</li>`);
				else
					$(`.calendar .list-days #days_${current_list}`).append(`<li>${today}</li>`);

			}

		}

		var last_length = 7 - $(".calendar .list-days #days_5 li").length;

		for ( let ch = 0; ch < last_length; ch++ ) {

			$(`.calendar .list-days #days_5`).append(`<li class="no-visible">0</li>`);

		}

	}
	const Change = (month, year) => {

		let Months = ["January", "February", "March", "April", "May", "June", "July", "August",
						"September", "October", "November", "December"];
		var name = Months[month-1];
		var end_year = parseInt(year) == parseInt(Get_Date("year")) + years_num - 1;
		var start_year = parseInt(year) == parseInt(Get_Date("year"));

		if ( month == 12 && end_year ) $(".calendar .next").addClass("no-visible");
		else $(".calendar .next").removeClass("no-visible");
		if ( ( month == 1 || month == Get_Date("month") ) && start_year ) $(".calendar .prev").addClass("no-visible");
		else $(".calendar .prev").removeClass("no-visible");

		$(".calendar .month").data("month", month).data("year", year).text(`${name} ${year}`);

		current_date = new Date(`${year}-${month}-1`);
		var first_day = current_date.getDay();
		current_date = new Date(year, month, 0);
		var num_days = current_date.getDate();

		set_days(first_day, num_days, month, year);

	}
	$(".calendar").on("click", ".prev", function(){

		let current_month = parseInt($(".calendar .first .month").data("month"));
		let current_year = parseInt($(".calendar .first .month").data("year"));

		current_month--;

		if ( current_month < 1 ) { current_month = 12; current_year--; }

		Change(current_month, current_year);

	});
	$(".calendar").on("click", ".next", function(){

		let current_month = parseInt($(".calendar .first .month").data("month"));
		let current_year = parseInt($(".calendar .first .month").data("year"));

		current_month++;

		if ( current_month > 12 ) { current_month = 1; current_year++; }

		Change(current_month, current_year);

	});
	$(document).on("click", function(e){

		if ( ! Check_Class(e.target, "calendar") && !Check_Class(e.target, "show-calendar") ) hide_calendar();

	});

	Change(Get_Date("month"), Get_Date("year"));

}
function calendar_date () {

    let el = $(".calendar ul .active");
	if ( $(el).hasClass("none") ) return true;
	let Months = ["January", "February", "March", "April", "May", "June", "July", "August",
	"September", "October", "November", "December"];
	let Days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	var year = $(".calendar .first .month").data("year");
	var month = $(".calendar .first .month").data("month");
	var day = $(el).text();
	var day_name = Days[$(el).index()];
	var month_name = Months[month-1];
	var date = `${day_name}, ${month_name.slice(0, 3)} ${day}, ${year}`;
    hide_calendar();
    $(".calendar").data("date", date);
    $(".calendar").data("base_date", `${year}-${month}-${day}`);
    return date;

}
function show_calendar (top, left, width) {

    $(".calendar").css({"top": top || "5rem", "left": left || "5rem", "width": width || "23rem"});
	$('.calendar').css({"transform": "scale(0)", "transition": "all .1s linear"});
	$(".calendar").show();

	setTimeout( _ => { $(".calendar").css("transform", "scale(1)"); });

}
function hide_calendar () {

	$(".calendar").css("transform", "scale(0)");

	setTimeout( _ => { $(".calendar").hide(); }, 100);

}
function stars(){

    const set = (div) => {

        let id = parseFloat($(div).attr("id"));

        if ( id == 5 ) $(div).html($(".stars-divs .five-star").html()).css("display", "flex");
        if ( id == 4.5 ) $(div).html($(".stars-divs .four-and-half-star").html()).css("display", "flex");
        if ( id == 4 ) $(div).html($(".stars-divs .four-star").html()).css("display", "flex");
        if ( id == 3.5 ) $(div).html($(".stars-divs .three-and-half-star").html()).css("display", "flex");
        if ( id == 3 )  $(div).html($(".stars-divs .three-star").html()).css("display", "flex");
        if ( id == 2.5 ) $(div).html($(".stars-divs .two-and-half-star").html()).css("display", "flex");
        if ( id == 2 ) $(div).html($(".stars-divs .two-star").html()).css("display", "flex");
        if ( id == 1.5 ) $(div).html($(".stars-divs .one-and-half-star").html()).css("display", "flex");
        if ( id == 1 ) $(div).html($(".stars-divs .one-half-star").html()).css("display", "flex");
        if ( id == .5 ) $(div).html($(".stars-divs .half-star").html()).css("display", "flex");
        if ( !id ) $(div).html($(".stars-divs .no-star").html()).css("display", "flex");

    }

    $(".stars").each(function(){ set(this); });

}
function set_element(){

    $("nav").on("mouseenter", ".nav-icon", function(){
        $("nav .nav-icon").each(function(){ $(this).removeClass("active"); });
        $(this).addClass("active");
        $(this).find(".nav-menu").css({"top": $("nav").outerHeight() + 1, "left": Position(this, "left")});
    });

}
function clicks(){

    $(document).on("click", function(e){

        if ( !Check_Class(e.target, "nav-icon") ) $("nav .nav-icon").removeClass("active");
        if ( Check_Class(e.target, "nav-side", false) ) {
            $("body").removeClass("no-scroll");
            $(".nav-side .side").css("margin-left", "-20rem");
            setTimeout( _ => { $(".nav-side").hide(); }, 100);
        }
        if ( Check_Class(e.target, "side-menu", false) ) {
            $(".side-menu").hide();
        }

    });
    $(document).on("click", "nav .show-side", function(){
        $("body").addClass("no-scroll");
        $(".nav-side").css("display", "flex");
        setTimeout( _ => { $(".nav-side .side").css("margin-left", "0"); });
    });
    $(document).on("click", ".nav-side .langs", function(){
        $(".nav-side .langs-menu").css("display", "flex");
    });
    $(document).on("click", ".side-menu .close", function(){
        $(".nav-side .side-menu").hide();
    });
    $(document).on("click", ".nav-side .close-side", function(){
        $("body").removeClass("no-scroll");
        $(".nav-side .side").css("margin-left", "-20rem");
        setTimeout( _ => { $(".nav-side").hide(); }, 100);
    });
    $(document).on("click", ".calendar .list-days li:not(.none)", function(){
        $(".calendar .list-days li").each(function(){ $(this).removeClass("active") });
        $(this).addClass("active");
        $(".calendar").data("date", calendar_date());
    });
    $(".scroll-up").click(function () {
        $(window).scrollTop(0);
    });
    $(document).on("click", "a .favor", function(){
        return false;
    });
    $("nav .search-div input").on("focus", function(){
        $("nav .search-div").addClass("active");
    });
    $("nav .search-div input").on("blur", function(){
        $("nav .search-div").removeClass("active");
    });

}

function publicSlide(){

    new_swiper(".header-slider", ".header-pagination", "<div class='swiper-pagination-bullet'></div>");
    new_swiper(el_slider=".home-tour-slider", pagination="", swiper_pagination="", slides=4, space=20, group=1, breaks=1);
    new_swiper(el_slider=".home-tour-slider1", pagination="", swiper_pagination="", slides=4, space=20, group=1, breaks=2);
    calendar(2);
    calendar_date();
    stars();
    set_element();
    clicks();
}

publicSlide();
