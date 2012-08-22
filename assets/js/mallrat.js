$(document).ready(function () {
    load_records(1);

    $("input#mall_name").bind('keypress', function (e) {
        if (e.keyCode == 32 || e.keyCode == 13) {
            //space button hit

            mall_name = $("input#mall_name").val()
            lookup_matches(mall_name)

        }
    })

    window.mallrat_id = '';
    window.micello_id = 0;
    window.point_inside_id = 0;

})

function lookup_matches(name) {
    $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'view=matches&mall_name=' + name,
        success:function (response) {
            $("div#matches_ajax").html(response)
            activate_selection()

        },
        dataType:"HTML"
    });
}

function activate_selection() {
    $(".micello").click(function () {

        $(".micello").each(function () {
            $(this).find("span.icon-check").hide()
        })

        $(this).find("span.icon-check").show()
        window.micello_id = $(this).find("input#id").val()
    });

    $(".point_inside").click(function () {

        $(".point_inside").each(function () {
            $(this).find("span.icon-check").hide()
        })

        $(this).find("span.icon-check").show()
        window.point_inside_id = $(this).find("input#id").val()
    });
}


function show_record(id, name) {
    $("input#mall_name").val(name)
    $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'view=mallrat&id=' + id,
        success:function (response) {
            $("p#mallrat_ajax").html(response)

            window.mallrat_id = id
            lookup_matches(name);

        },
        dataType:"HTML"
    });
}


function load_records(page) {
    $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'view=records&page=' + page,
        success:function (response) {
            $("ul#records").html("")
            for (x in response) {
                anchor_html = '<a onclick="show_record(\'' + response[x].ID + '\',\'' + response[x].MALLNAME + '\')"> ' + response[x].MALLNAME + '</a>';
                $("ul#records").append("<li>" + anchor_html + "</li>")
            }

            if (page > 0) {
                window.pageNo = page;
                $("#page").val(page)
            }
        },
        dataType:"JSON"
    });
}

function goto_page() {
    page = $("#page").val()
    load_records(page)
}

function goto_next() {
    page = window.pageNo + 1;
    load_records(page)
}

function goto_prev() {
    page = window.pageNo - 1;
    load_records(page)
}

function save_match() {

    data_string = "mallrat=" + escape(mallrat_id) + "&micello=" + micello_id + "&point_inside=" + point_inside_id
    $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'view=save&' + data_string,
        success:function (response) {
            alert('Match saved!');

        },
        dataType:"JSON"
    });

}