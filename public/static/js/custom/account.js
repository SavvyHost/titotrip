
function clicks(){
    
    $(document).ready(function () {
        try { $("input[type='text']").each(function(){ $(this).attr("autocomplete","off"); }); }
        catch (e){ print("Done") }
    });
    $(".show-div").click(function(){
        if ( $(window).width() < 800 ) $(".left-card").hide();
        $(".right-card .card-body").hide();
        $(".right-card").show();
        $(`.right-card .${$(this).attr("id")}`).fadeIn();
        $(window).scrollTop(0);
    });
    $(".left-card a").click(function(){
        $(".left-card a").each(function(){ $(this).removeClass("active"); });
        $(this).addClass("active");
    });
    $(".main-card .right-card .back").click(function(){
        $(".right-card").hide();
        $(".left-card").fadeIn();
        $(".show-div").removeClass("active");
    });

    $(".right-card input:not(.search-input)").css("padding", "1.1rem .6rem");
    $(".left-card a").css("border", "0").addClass("border-a");
    if ( $(window).width() > 800 ) $(".account .left-card .show-div").first().addClass("active")

}
function public_account(){
   
    clicks();

}

public_account();