


function filters () {

    $(".search .right .list-actions, .search .right .list-result").hide();
    $(".loader").css("display", "flex");

    setTimeout( _ => {
        $(".loader").hide();
        $(".search .right .list-actions, .search .right .list-result").fadeIn().css("dispaly", "flex");
    }, 1000);

}
function clicks () {

    $(".search .title").html(`
        <span class="tell flex-start">Showing &nbsp; <div class="count flex-start"><span>23</span> results </div>&nbsp; for</span>
        <span class="query">${Query("query")} - ${Query("date")}</span>
    `);
    $(".search .empty .query").html(`“${Query("query")} - ${Query("date")}“`)
    $(".show-search-side").click(function(){
        $(".result .left").fadeIn().css("display", "flex");
    });
    $(".close-search-side").click(function(){
        $(".result .left").fadeOut();
    });
    $(document).on("click", function(e){
        if ( Check_Class(e.target, "left", false) ) $(".result .left").fadeOut();
    });
    $(".search .date-input").click(function(){

		let top = Position(this, "top") + $(this).outerHeight() + 3;
		let left = Position(this, "left");
		let width = $(this).outerWidth();
		$(window).scrollTop( Position(this, "top") - $(this).outerHeight() - 120 );
		show_calendar(top, left, width);

	});
    $(".search .left .side ul").on("click", "li:not(.cal)", function(){
        $(this).find(".checkbox").toggleClass("active");
        filters();
    });
    $(".clear-filters").click(function(){
        $(".search .left .side ul li .checkbox").removeClass("active");
        $(".search .left .side .date-input p").text("Select Date");
        filters();
    });
    $(document).on("click", ".calendar .list-days li:not(.none)", function(){
        filters();
    });

}
function actions () {

    let tours = $(".search .right .list-result .tour-card");
    $(".search .count span").text(tours.length);

    if ( !tours.length ) {
        $(".success-search").remove();
        $(".faild-search").css("display", "flex");
    }

}
function public_search () {

    clicks();
    actions();

}

public_search();


