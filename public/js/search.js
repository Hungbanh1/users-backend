$(document).ready(function()
{
    // Khai báo đối tượng timeout để dùng cho hàm
    // clearTimeout
    var timeout = null;
 
    // Sự kiện keyup
    $('.keyword').keyup(function()
    {
        // Xóa đi những gì ta đã thiết lập ở sự kiện 
        // keyup của ký tự trước (nếu có)
        // clearTimeout(timeout);
        // console.log(product);
        // Sau khi xóa thì thiết lập lại timeout
        timeout = setTimeout(function ()
        {
            // Lấy nội dung search
            var data = {
                keyword : $('.keyword').val(),
                // url = 'http://localhost/laravelpro/unimart/users/san-pham//1?iphone-12-mini-64gb'
            };
            console.log(data);
            

            // var data = $(this).val();
            // console.log(data);
           
            // Gửi ajax search
            $.ajax({
                type : 'get',
                method :'get',
                dataType : 'json',
                data : data,
                url : 'http://localhost/laravelpro/unimart/users/search/searchajax',
                success : function (data){
                    // $('#result').html(result);
                    // $('#search-data')
                    // console.log(data);
                    // $('#search-data').each(function(product){
                    //     console.log(data);
                    // })
                    
                    $("ul#search-data").find("li").remove().end();
                    $.each(data.product,function(index,value){
                        var price = value.price;
                        var format  = parseFloat(price,0).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
                        // console.log(format);
                        console.log(format)
                        var content =
                        '<li class="clearfix">' +
                         '<a href="http://localhost/laravelpro/unimart/users/san-pham/'+value.cat_id+'/'+value.id+'?'+value.slug+'">' +
                        '<div class="thumb-info fl-left">'+
                        '  <img src="'+value.product_thumb+'" alt="">'+

                        '</div>'+
                        ' <div class="info-product fl-left">'+
                        '      <p class="product_name">'+value.product_name+'</p>'+
                        
                        '<p class="price">'+format+' VNĐ</p>'+
                        ' </div>' +
                        '  </a>'+
                        '  </li>  '
                        
                        
                        ;
                    $("ul#search-data").append(content);
                        // console.log(content);         
                     })

                    
         
                    $('#search-data').css({"display": 'block' , "transition" : 'all 0.5s cubic-bezier(0.25, 0.1, 0.86, 0.25) 0s'});
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }, 200);
         
    });
});
$(".btn-view-more").click(function() {
    $(this).prev().slideDown().removeClass("view-more");
    $(".btn-hidden").removeClass("hidden");
    $(this).addClass("hidden");
});
$(".btn-hidden").click(function() {
    $(".btn-view-more").prev().addClass("view-more");
    $(".btn-view-more").removeClass("hidden");
    $(this).addClass("hidden");
});
