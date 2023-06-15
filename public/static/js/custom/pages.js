
function Check_Availability ( ) {

	const check_now = _ => {

		$(".media-show").fadeOut(100);
		$("body").removeClass("no-scroll").removeClass("over-hide");

		let price = $(".show .check .price span").text();
		let adults = $(".show .check .number-input p").text();
		let total = parseFloat(price.replace(/\$/gi, "")) * parseFloat(adults.split(" ")[0]);

		$(".availability ul li .price").text(`$${total.toFixed(2)}`);
		$(".availability ul li .adults").text(`${adults} x ${price}`);
		
		setTimeout( _ => {
			$(".availability .loader").hide();
			$(".availability .list").css("display", "flex");
		}, 500);
		
	}
	$(".check-availability").click(function(){
		$(".availability .list").hide();
		$(".availability .loader").css("display", "flex");
		$(".availability").css("display", "flex");
		$(window).scrollTop( Position(".show .check .show-adult", "top") - $(".show .check .show-adult").outerHeight() - 10 );
		check_now();
	});
	$(".tour .adult .apply").on("click", function(){
		check_now();
	});

}
function check_out () {

	const book_now = (book_type) => {

		var date = $(".calendar").data("base_date");
		let cancel_time = "10:00 AM";
		let cancel_date = "May 06, 2023";
		let time = $(".tour .availability .time-div.active").text().trim().split(" ")[0].trim();
		var title = $(".tour .title").text().trim();
		var price = $(".tour .availability .price").text();
		var tour_id = Query("id");
		let language = "English,Franch";
		let image = $(".tour .tour-slider-div .image").first().find("img").attr("src");
		var adults = parseInt($(".tour .show .number-input p").text().trim().split(" ")[0].trim());
		let data = {
			"tour_id": tour_id, "date": date, "time": time, "title": title,
			"price": price, "cancel_date": cancel_date, "cancel_time": cancel_time,
			"book_type": book_type, "adults": adults, "image": image, "tour_lang": language,
		}
		localStorage.setItem("check_out", JSON.stringify(data));
		window.location.href = "/checkout";

	}
	$(".tour").on("click", ".book-now", function(){ book_now("now"); });
	$(".tour").on("click", ".pay-later", function(){ book_now("layter"); });

}
function header_search () {

	let date =  $(".calendar").data("base_date");
	let search_date = $(".search-form .form-date").text().trim().toLowerCase() != "dates";
	let text = $(".search-form input").val().trim().toLowerCase().replace(/\s+/gi, " ");
	let url = "";
	if ( text ) url = `/search?query=${text}`;
	if ( search_date ) url = `/search?date=${date}`;
	if ( text && search_date ) url = `/search?query=${text}&date=${date}`
	window.location.href = url;

}
function Clicks () {

	$(".availability").on("click", ".time-div:not(.none)", function(){
		$(".availability .time-div").removeClass("active");
		$(this).addClass("active");
	});
	$(".show .check .date-input").click(function(){

		let top = Position(this, "top") + $(this).outerHeight() + 3;
		let left = Position(this, "left");
		let width = $(this).outerWidth();
		$(window).scrollTop( Position(this, "top") - $(this).outerHeight() - 25 );
		show_calendar(top, left, width);

	});
	$(".search-form .date-input").click(function(){

		let top = Position(this, "top") + $(this).outerHeight() + 10;
		let left = Position(this, "left");
		let width = $(this).outerWidth();
		if ( $(window).width() < 600 ) width = $(".search-form .input").outerWidth();
		$(window).scrollTop( Position(this, "top") - $(this).outerHeight() - 100 );
		show_calendar(top, left, width);

	});
	$(".show .check .show-adult").click(function(){

		let top = Position(this, "top") + $(this).outerHeight() + 3;
		let left = Position(this, "left");
		let width = $(this).outerWidth();
		$(window).scrollTop( Position(this, "top") - $(this).outerHeight() - 87 );
		
		$(".tour .adult").css({"top": top, "left": left, "width": width});
		$(".tour .adult").css("display", "flex");
		setTimeout( _ => { $(".tour .adult").css("transform", "scale(1)"); });

	});
	$(".info-data .left").on("click", ".first", function(){

		if ( $(this).parents(".section").hasClass("active") ) {
			$(this).parents(".section").find("ul").slideUp(200);
			setTimeout( _ => {
				$(this).parents(".section").find("ul").hide();
				$(this).parents(".section").removeClass("active");
			}, 200);
		}
		else {
			$(this).parents(".section").addClass("active");
			$(this).parents(".section").find("ul").slideDown(200).css("display", "flex");
		}

	});
	$(".to-reviews").click(function(){
		$(window).scrollTop( Position($(".info-data .right .reviews").get(0), "top") )
	});
	$(".media-show").on("click", ".close", function(){
		$(".media-show").fadeOut(100);
		$("body").removeClass("no-scroll").removeClass("over-hide");
	});
	$(".tour .adult").on("click", ".increase", function(){
		let value = parseInt($(".tour .adult .input-num label").text().trim());
		if ( value >= 14 ) return true;
		$(".tour .adult .input-num label").text(++value);
		$(".check .number-input p").text(`${value} Adults`);
		if ( value == 1 ) 	$(".check .number-input p").text(`${value} Adult`);
	});
	$(".tour .adult").on("click", ".decrease", function(){
		let value = parseInt($(".tour .adult .input-num label").text().trim());
		if ( value < 2 ) return true;
		$(".tour .adult .input-num label").text(--value);
		$(".check .number-input p").text(`${value} Adults`);
		if ( value == 0 ) $(".check .number-input p").text(`--`);
		if ( value == 1 ) 	$(".check .number-input p").text(`${value} Adult`);
	});
	$(".tour .adult .apply").on("click", function(){
		$(".tour .adult").css("transform", "scale(0)");
		setTimeout( _ => { $(".tour .adult").hide(); }, 150);
	});
	$(document).on("click", ".calendar li:not(.none)", function(){
		$(".date-input p").text( $(".calendar").data("date") );
		$(".date-input .reset-p").show();
	});
	$(document).on('click', function(e){
		if ( !Check_Class(e.target, "show-adult") && !Check_Class(e.target, "adult") ){
			$(".tour .adult").css("transform", "scale(0)");
			setTimeout( _ => { $(".tour .adult").hide(); }, 150);
		}
	});
	$(window).on("load resize scroll", function(){

		$(".tour .date-input p").text( $(".calendar").data("date") );
		let data = JSON.parse(localStorage.getItem("wishlist")) || [];

		$(".tour-card").each(function(){
			if ( data.includes($(this).data("id")) ) {
				$(this).find(".favor.add").hide();
				$(this).find(".favor.del").css("display", "flex");
			}
		});
		if ( data.includes(parseInt(Query("id"))) ) {
			$(".tour").find(".favor.add").hide();
			$(".tour").find(".favor.del").css("display", "flex");
		}
		if ( $(window).width() < 600 ) {
            $(".search-div input").prop("placeholder", "Search");
        }
		else{
            $(".search-div input").prop("placeholder", "Search for activity");
		}
		if ( $(window).scrollTop() > Position($(".tour .info-data .right"), "top") - 150) {
			$(".sub-nav").css("display", "flex");
		}
		else $(".sub-nav").hide();

		let element = "";
		$(".tour .info-data .right > div").each(function(){
			if ( $(window).scrollTop() > Position(this, "top") - 40 ) element = $(this).attr("id");
		});
		
		$(".sub-nav a").first().addClass("active");
		if ( element )  {
			$(".sub-nav a").removeClass("active");
			$(`.sub-nav a#${element}`).addClass("active");
		}

	});
	$(".search-form .reset-p").click(function(){
		$(".search-form .form-date").text("Dates");
		$(this).hide();
		hide_calendar();
		return false;
	})
	$("nav .search-div input").on("keydown", function(e){
		if ( e.key == "Enter" ) {
			let text = $("nav .search-div input").val().trim().toLowerCase().replace(/\s+/gi, " ");
			if ( text ) {
				let url = `/search?query=${text}`;
				window.location.href = url;
			}
		}
	});
	$(".sub-nav").on("click", "a", function(){
		$(window).scrollTop( Position( $(`.tour .info-data .right div#${$(this).attr("id")}`), "top" ) - 40 );
		$(".sub-nav a").removeClass("active");
		$(this).addClass("active");
	});
	$(".search-form button").on("click", header_search);
	$(".search-form input").on("keydown", function(e){ if ( e.key == "Enter" ) header_search(); });

}
function wishlist () {

	const add_wishlist = (id) => {
		id = parseInt(id);
		let data = JSON.parse(localStorage.getItem("wishlist")) || [];
		if ( !data.includes(id) ) data.push(id);
		localStorage.setItem("wishlist", JSON.stringify(data));
		$("nav .nav-icon .count").css("display", "flex").find("div").text(data.length);
	}
	const del_wishlist = (id) => {
		let data = JSON.parse(localStorage.getItem("wishlist")) || [];
		data = data.filter( _ => _ != id);
		localStorage.setItem("wishlist", JSON.stringify(data));
		$("nav .nav-icon .count").css("display", "flex").find("div").text(data.length);
		if ( ! data.length ) $("nav .nav-icon .count").hide();
	}
	const bring_wishlist = _ => {

		data = JSON.parse(localStorage.getItem("wishlist")) || [];

		if ( !data.length ) $(".wishlist .loader").hide();

		else $("nav .nav-icon .count").css("display", "flex").find("div").text(data.length);

		$.ajax({
			url: "/actions",
			method: "POST",
			data: {"wishlist": data},
			headers: {
				"request": "wishlist",
				'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")
			},
			success: (data) => {
				
				let list = data['wishlist'];

				if ( !list.length ) return true;

				list.forEach( _ => {

					let element = `
						<a href="/tour?id=${_['id']}" data-id="${_['id']}" class="flex-column relative active tour-card li">

							<div class="image full-width flex"> <img src="${_['image']}"> </div>

							<p class="full-width flex-start location"> <i class="fa fa-globe"></i> <span>${_['location']}</span> </p>

							<h1 class="full-width">${_['title']}</h1>

							<div class="replys flex-start full-width">

								<div class="stars" id="5"></div>

								<span class="flex">${_['reviews']}</span>

							</div>

							<p class="full-width flex-start p"> from
							<span class="bold">$${parseFloat(_['price']).toFixed(2)}</span>
							</p>
							<p class="full-width flex-start p"> Price varies by group size </p>

							<div class="favor absolute flex pointer circle add hide"><i class="fa fa-heart-o"></i></div>
							<div class="favor absolute flex pointer circle del"><i class="fa fa-heart"></i></div>

						</a>
					`;
				
					$(".wishlist .list-wishlist").append(element);

				});

				$(".wishlist .empty, .wishlist .loader").hide();
				$(".wishlist .all-cards").css("display", "flex");

				stars();

			},
			error: () => {}
		});

	}
	$(document).on("click", "a .favor.add", function(){
		$(this).hide();
		$(this).parents(".tour-card").find(".del").css("display", "flex");
		add_wishlist($(this).parents(".tour-card").data("id"));
	});
	$(document).on("click", "a .favor.del", function(){
		$(this).hide();
		$(this).parents(".tour-card").find(".add").css("display", "flex");
		del_wishlist($(this).parents(".tour-card").data("id"));
		$(`.wishlist .tour-card[data-id='${$(this).parents(".tour-card").data("id")}']`).remove();
		if ( !$(".wishlist .tour-card").length ) {
			$(".wishlist .all-cards").hide();
			$(".wishlist .empty").css("display", "flex");
		}
	});
	$(document).on("click", ".tour .favor.add", function(){
		$(this).hide();
		$(".tour .favor.del").css("display", "flex");
		add_wishlist(Query("id"));
	});
	$(document).on("click", ".tour .favor.del", function(){
		$(this).hide();
		$(".tour .favor.add").css("display", "flex");
		del_wishlist(Query("id"));
	});
	
	bring_wishlist();

}
function Media_Show () {

    let tour_swiper = new Swiper(".tour-slider-div", {
        slidesPerView: 1,
        loop: true,
        speed: 400,
        effect: "slide",
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.tour-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return `<div class="image swiper-pagination-bullet">
                            <img src="${$($(".tour-slider-div .swiper-wrapper .swiper-slide").get(index+1)).find("img").attr("src")}">
                            <div class="div"></div>
                        </div>
                `;
                
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {},
    });
    let media_swiper = new Swiper(".media-slider", {
		slidesPerView: 1,
		loop: true,
		speed: 600,
		effect: "coverflow",
		loopFillGroupWithBlank: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.small-image',
			clickable: true,
            renderBullet: function (index, className) {

                return `<div class="image ${className}">
                            <img src="${$($(".media-slider .swiper-wrapper .swiper-slide").get(index+1)).find("img").attr("src")}">
                            <div class="div"></div>
                        </div>
                `;
                
            },
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {},
	});
    media_swiper.on('slideChange', function () {
        $(".media-show .count .current").html(media_swiper.realIndex+1);
    });

    const Show = _ => {
        
        $(".media-show .shower .swiper-wrapper").html( $(".show .right .swiper-wrapper").html() )
        let image_number = $(".show .right .swiper-wrapper").data("count");
		$(".media-show").fadeIn(100);
		$(".media-show .shower").css({"height": $(window).height() - $(".media-show .first").outerHeight()});
		$(".media-show .media-slider")
		.css({"height": $(window).height() - $(".media-show .first").outerHeight() - $(".media-show .small-image").outerHeight()});
		$("body").addClass("no-scroll").addClass("over-hide");
		$(".media-show .count .all").text( image_number );

	}
	$(".left .see-more, .show .right .image").click(function(){
		Show();
	});

}
function Public_Tour () {

	Media_Show();
	Check_Availability();
	Clicks();
	check_out();
	wishlist();

}

Public_Tour();