let search_text = "";
let data_number = 5;
let data_filter = localStorage.getItem("table_filter") || "actived";
let data_size = localStorage.getItem("table_size") || 5;
let list_filter = ["actived", "canceled", "oldest"];
let list_rows = ["5", "10", "15", "25", "50"];

function clicks(){

    $(document).on("click", function(e){

        if ( ! Check_Class(e.target, "show-options") ) {
            $(".table-menu").hide();
        }
        if ( !Check_Class(e.target, "show-select-options") ) {
            $(".show-select-options").removeClass("active");
            $(".select-options").hide();
        }
        if ( !Check_Class(e.target, "entry") ) {
            $(".input .entry").removeClass("active");
        }
        if ( Check_Class(e.target, "full-actions", false) || Check_Class(e.target, "close") ) {
            $(".full-actions").fadeOut();
        }

    });
    $(document).on("click", ".table .show-options", function(){

        if ( ! Check_Hidden( $(this).parents(".table").find(".table-menu") ) && 
        $(this).parents(".table").find(".table-menu").attr("id") == $(this).parents("tr").data("id") ) { 
            $(".table-menu").hide(); return true; 
        }
        let top = Position(this, "top") + $(this).outerHeight() + 2 - $(this).parents(".table").offset().top;
        let right = Position(this, "left") - Position($(this).parents(".table"), "left");
        // $(window).scrollTop(top);
        // if ( (Position(this, "bottom") - $(this).parents(".table").find(".table-menu").outerHeight()) < 10 ) {
        //     top -= ($(this).parents(".table").find(".table-menu").outerHeight() + $(this).outerHeight() + 4)
        // }
        $(this).parents(".table").find(".table-menu").attr("id", $(this).parents("tr").data("id"))
        $(this).parents(".table").find(".table-menu").css({"top": top, "left": right});
        setTimeout( _ => { $(this).parents(".table").find(".table-menu").css("display", "flex") });

    });
    $(document).on("click", ".table td .checkbox", function() {
        $(this).toggleClass("active");
        let check = true;
        $(this).parents(".table").find(".shown .checkbox").each(function() {
            if (!$(this).hasClass("active")) check = false;
        });
        if (check) $(this).parents(".table").find("th .checkbox").addClass("active");
        else $(this).parents(".table").find("th .checkbox").removeClass("active");
    });
    $(document).on("click", ".table th .checkbox", function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents(".table").find(".shown .checkbox").each(function() {
                $(this).removeClass("active");
            });
        } else {
            $(this).addClass("active");
            $(this).parents(".table").find(".shown .checkbox").each(function() {
                $(this).addClass("active");
            });
        }
    });
    $(document).on("click", ".table .show-select-options", function(){

        $(this).parents(".table").find(".show-select-options").each(function(){ $(this).removeClass("active"); });
        $(this).addClass("active");
        $(this).parents(".select").find("li").each(function(){
            if ( $(this).data("value") == $(this).parents(".select").find('.show-select-options p').text().trim() ) {
                $(this).addClass("active");
            }
            else $(this).removeClass("active");
        });

        if ( Check_Hidden($(this).parents(".select").find(".select-options")) ) {
            $(this).parents(".table").find(".select .select-options").hide();
            $(this).parents(".select").find(".select-options").css("display", "flex");
        }
        else{
            $(this).removeClass("active");
            $(this).parents(".select").find(".select-options").hide();
        }

    });
    $(document).on("focus", ".table .input input", function(e){
        $(this).parents(".table").find(".input .entry").addClass("active");
    });
    $(document).on("click", ".actions .rows li", function(){
        $(this).parents(".rows").find("li").each(function(){ $(this).removeClass("active"); });
        $(this).addClass("active");
        data_size = $(this).data("value");
        localStorage.setItem("table_size", data_size);
        set_table($(this).parents(".table"));
    });
    $(document).on("click", ".actions .filter li", function(){
        $(this).parents(".filter").find("li").each(function(){ $(this).removeClass("active"); });
        $(this).addClass("active");
        data_filter = $(this).data("value");
        localStorage.setItem("table_filter", data_filter);
        set_table($(this).parents(".table"));
    });
    $(document).on("click", ".all-actions", function(){
        if ( Check_Hidden( $(this).parents(".table").find(".full-actions") ) ) {
            let selected = $(this).parents('.table').find("tr:not(.thead):not(.fade):not(.hide) .checkbox.active").length;
            $(this).parents(".table").find(".full-actions .selected span").text(selected);
            $(this).parents(".table").find(".full-actions").fadeIn().css("display", "flex");
        }
        else $(this).parents(".table").find(".full-actions").fadeOut()
    });

}
function pagination(table, number, size){

    const set_pagination = (table, pagination_number, row_size) => {

        let pagination = $(table).find(".pagination");
        let counter = 0, cur_size = 0;

        $(table).find("tr:not(.thead):not(.fade)").each(function() {

            if (counter % row_size == 0) cur_size++;

            $(this).attr("id", cur_size);

            counter++;

        });
        $(pagination).find(".list").html("");
        $(table).find("tr:not(.thead):not(.fade)").each(function() { $(this).hide().removeClass("shown"); });
        $(table).find(`tr#1:not(.thead):not(.fade)`).show().addClass("shown");

        for (let ch = 0; ch < cur_size; ch++) {

            $(pagination).find(".list").append(`<a id='${ch+1}' class="shown no-select">${ch+1}</a>`);

        }
        $(pagination).find(".list a").each(function() { $(this).hide().removeClass("shown"); });
        $(".pagination .list a").first().addClass("active");
        $(".pagination .prev").addClass("none");
        if ($(pagination).find(".list a").length == 1) $(".pagination .next").addClass("none");
        $(pagination).find(".list a").each(function() {
            if ($(this).index() < pagination_number) $(this).show().addClass("shown");
        });

    }
    const active_element = (element) => {

        if ( $(element).hasClass("active") ) return true;
        let pagination = $(element).parents(".pagination");
        let table = $(element).parents(".table");
        let index = $(element).index() + 1;
        let count = $(pagination).find(".list a").length;

        if (index == 1) $(pagination).find(".prev").addClass("none");
        else $(pagination).find(".prev").removeClass("none");
        if (index == count) $(pagination).find(".next").addClass("none");
        else $(pagination).find(".next").removeClass("none");

        $(pagination).find(".list a").each(function() { $(this).removeClass("active"); });
        $(table).find(".checkbox").each(function() { $(this).removeClass("active"); });
        $(element).addClass("active");
        $(table).find("tr:not(.thead):not(.fade)").each(function() { $(this).hide().removeClass("shown"); });
        $(table).find(`tr#${index}:not(.thead):not(.fade)`).show().addClass("shown");

        if ($(element).index() == $(element).parents(".list").find(".shown").first().index()) {
            let prev_index = $(element).index() - 1;
            if (prev_index >= 0) {
                $(element).parents(".list").find(".shown").last().hide().removeClass("shown");
                let prev_el = $(element).parents(".list").find("a")[prev_index];
                $(prev_el).show().addClass("shown");
            }
        }
        if ($(element).index() == $(element).parents(".list").find(".shown").last().index()) {
            let next_index = $(element).index() + 1;
            if (next_index < $(element).parents(".list").find("a").length) {
                $(element).parents(".list").find(".shown").first().hide().removeClass("shown");
                let next_el = $(element).parents(".list").find("a")[next_index];
                $(next_el).show().addClass("shown");
            }
        }

    }
    $(table).on("click", ".pagination a", function() {
        active_element(this);
    });
    $(table).on("click", ".pagination .next", function() {

        if ($(this).hasClass("none")) return true;
        let el = $(this).parents(".pagination").find(".list a.active").next();
        active_element(el);

    });
    $(table).on("click", ".pagination .prev", function() {

        if ($(this).hasClass("none")) return true;
        let el = $(this).parents(".pagination").find(".list a.active").prev();
        active_element(el);

    });
    $(table).append(`
        <div class="pagination">
            <div>
                <div class="prev"><span class="material-symbols-outlined go-icon reverse-rotate">double_arrow</span></div>
                <div class="list"></div>
                <div class="next"><span class="material-symbols-outlined go-icon">double_arrow</span></div>
            </div>
        </div>
    `);

    set_pagination(table, number, size);

}
function table_menu(table){

    $(table).find("tr:not('.thead')").append(`
        <td class="option">
            <div>
                <div class="show-options">
                    <i class="fa fa-th"></i>
                    <span class="material-symbols-outlined go-icon no-select">arrow_drop_down</span>
                </div>
            </div>
        </td>
    `);
    $(table).find(".thead").append(`
        <th class="option">
            <div>
                <div class="all-actions" title="Apply actions">
                    <span class="material-symbols-outlined go-icon no-select">settings</span>
                </div>
            </div>
        </th>
    `)
    $(table).append(`
        <div class="table-menu">
            <ul>
                <li class="edit">
                    <span class="material-symbols-outlined go-icon">edit</span>
                    <p>Edit</p>
                </li>
                <li class="remove">
                    <span class="material-symbols-outlined go-icon">delete</span>
                    <p>Remove</p>
                </li>
                <li class="cancel">
                    <span class="material-symbols-outlined go-icon">cancel</span>
                    <p>Cancel</p>
                </li>
                <li class="brows">
                    <span class="material-symbols-outlined go-icon">history</span>
                    <p>Brows</p>
                </li>
            </ul>
        </div>
    `);
    $(table).append(`
        <div class="full full-actions">
            <div class="message">
                <div class="first">
                    <div>
                        <span class="material-symbols-outlined go-icon no-select">settings</span>
                        Actions
                    </div>
                    <div class="close"> <span class="material-symbols-outlined go-icon no-select">close</span> </div>
                </div>
                <div class="selected no-select"> <p> Selected : <span>0</span> </p> </div>
                <ul>
                    <li class="remove">
                        <div> <span class="material-symbols-outlined go-icon no-select">delete</span> Remove all </div>
                        <span class="material-symbols-outlined go-icon no-select">arrow_right</span>
                    </li>
                    <li class="cancel">
                        <div> <span class="material-symbols-outlined go-icon no-select">cancel</span> Cancel all </div>
                        <span class="material-symbols-outlined go-icon no-select">arrow_right</span>
                    </li>
                    <li class="brows">
                        <div> <span class="material-symbols-outlined go-icon no-select">history</span> Brows History </div>
                        <span class="material-symbols-outlined go-icon no-select">arrow_right</span>
                    </li>
                </ul>
            </div>
        </div>
    `);

}
function check_box(table){

    $(table).find("tr:not('.thead')").prepend(`
        <td class="box"> <div class="checkbox"> <i class="fa fa-check"></i> </div> </td>
    `);
    $(table).find(".thead").prepend(`
        <th class="box"> <div class="checkbox"> <i class="fa fa-check"></i> </div> </th>
    `);

}
function table_search(table, update){
    
    if ( update ) $(table).find(".input input").focus();
    
    const Search = _ => {

        let text = $(table).find(".input input").val().trim().toLowerCase().replace(/\s+/gi, " ");

        if ( text == search_text ) return true;

        if ( !text ) {
            
            $(table).find("tr:not(.thead)").show().removeClass("fade");
            
        }

        else {

            $(table).find("tr:not(.thead)").hide().addClass("fade");

            $(table).find("td:not(.option)").each(function(){

                if ( !Check_Class(this, "thead") ) {

                    let value = $(this).text().trim().toLowerCase().replace(/\s+/gi, " ");

                    value.includes(text) ? $(this).parents("tr").show().removeClass("fade") : "";

                }

            });

        }

        search_text = text;
        set_table(table, true)

    }

    $(table).find(".input input").keypress(function(e){
        if ( e.keyCode == 13 ) Search();
    });

    $(table).find(".input .buttons button").click(Search);

}
function actions(table, update){

    let actions = `

        <div class="actions">

            <div class="select-box">

                <div class="select rows">

                    <label>Rows</label>

                    <div>

                        <div class="show-select-options"> <p>05</p> <span class="material-symbols-outlined go-icon">expand_more</span> </div>
            
                        <div class="select-options flex-column">

                            <div class="options">

                                <ul></ul>

                            </div>
                
                        </div>

                    </div>
            
                </div>
                
                <div class="select filter">

                    <label>Filter</label>

                    <div>

                        <div class="show-select-options"> <p>Active</p> <span class="material-symbols-outlined go-icon">expand_more</span> </div>
            
                        <div class="select-options flex-column">

                            <div class="options">

                                <ul></ul>

                            </div>
                
                        </div>

                    </div>
            
                </div>

            </div>
            
            <div class="input">

                <div class="entry">

                    <i class="fa fa-search"></i>

                    <input type="text" placeholder="Search" class="search-input">

                </div>

                <div class="buttons">

                    <button class="no-select">Search</button>
                
                </div>

            </div>

        </div>

    `;
    let found = `

        <div class="found">
            <div class="no-select p"> Found <span>0</span> Items</div>
        </div>

    `;
    if ( !update ){
        $(table).prepend(found); $(table).prepend(actions);
        list_filter.forEach(_ => $(table).find(".actions .filter ul").append(`<li data-value="${_}">${_}</li>`));
        list_rows.forEach(_ => $(table).find(".actions .rows ul").append(`<li data-value="${_}">${_}</li>`));
    }
    else{ $(table).prepend( $(table).find(".found") ); $(table).prepend( $(table).find(".actions") ); }
    $(table).find(".found .p span").text($(table).find("tr:not(.thead):not(.fade)").length);
    $(table).find(".actions .rows .show-select-options p").each(function(){ $(this).text(data_size) })
    $(table).find(".actions .filter .show-select-options p").each(function(){ $(this).text(data_filter) })

    let data_options = $(table).data('none') || "";
    if ( data_options ) data_options = data_options.split(" ").map(_ => _.toString().trim().toLowerCase()).filter(_ => _);
    else data_options = [];

    if ( data_options.includes("rows") ) $(table).find(".actions .rows").remove();
    if ( data_options.includes("filter") ) $(table).find(".actions .filter").remove();
    if ( data_options.includes("search") ) $(table).find(".actions .input").remove();
    if ( data_options.includes("found") ) $(table).find(".found").remove();
    if ( data_options.includes("actions") ) $(table).find(".actions").remove();

}
function set_table(table, update){

    if ( !update ) $(table).find(".found, .actions").remove();
    $(table).find(".table-menu, .box, .option, .pagination").remove();
    let table_data = $(table).find("table").html();
    $(table).find(".table-div, table").remove();
    $(table).prepend(`<div class="table-div"><table>${table_data}</table><div class="empty no-select"> No Records Available .</div></div>`);
    $(table).find("tr").first().addClass("thead");
    actions(table, update);
    table_search(table, update);

    let data_options = $(table).data('none') || "";
    if ( data_options ) data_options = data_options.split(" ").map(_ => _.toString().trim().toLowerCase()).filter(_ => _);
    else data_options = [];

    if ( !data_options.includes("pagination") ) pagination(table, data_number, data_size);
    if ( !data_options.includes("menu") ) table_menu(table);
    if ( !data_options.includes("checkbox") ) check_box(table);

    if ( ! $(table).find("tr:not(.thead):not(.fade) td").length ) {
        $(".pagination, .box, .option").hide();
        $(table).find(".empty").css("display", "flex");
    }
    else {
        $(".pagination, .box, .option").show();
        $(table).find(".empty").hide();
    }

}
function tables() {

    $(".table").each(function(){
        
        set_table(this, false);
        clicks();
    
    });

    $(".table").each(function(){
        
        if ( !$(this).find("table tr td").length ) $(this).find(".actions, .found").remove();
    
    });

}

tables();
