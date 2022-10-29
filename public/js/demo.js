$("#search-wp #s").keyup(function() {
    var url = $("#search-wp form").attr("ajax-search");
    var keyword = $(this).val();
    var data = { keyword: keyword };

    $.ajax({
        url: url,
        method: 'GET',
        data: data,
        dataType: 'json',
        success: function(data) {
            if (keyword.length > 0) {
                $("ul#list-data").find("li").remove().end();
                $.each(data.products, function(index, value) {
                    var content = '<li class="clearfix">' +
                        '<a href="' + value.detail_url + '" class="clearfix" style="display:block">' +
                        '<div class="thumb fl-left">' +
                        '<img src="' + value.img + '" alt="' + value.name + '">' +
                        '</div> ' +
                        '<div class = "info fl-left" >' +
                        '<p class = "product-name" > ' + value.name + ' </p> ' +
                        '<p class="price"> ' + value.price + ' </p>' +
                        '</div> ' +
                        '</a>' +
                        '</li>';
                    $("ul#list-data").append(content);
                });
                $("ul#list-data").show();
            } else {
                $("ul#list-data").hide();
            }
        },
        // error: function(xhr, ajaxOptions, thrownError) {
        //     alert(xhr.status);
        //     alert(thrownError);
        // }
    });
});


