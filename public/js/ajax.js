//sẽ chạy khi trang load xong
$(document).ready(function(){
    //Dùng sự kiện change vì số lượng có thể thay đổi
    $(".num-order").change(function(){
        
        var id = $(this).attr('data-id');
      
        var qty = $(this).val();
        // alert(qty);

    
        var data = {id,qty};
        console.log(data);
        // alert(data);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "http://localhost/laravelpro/unimart/users/cart/ajax",
            method :'post',
            data : data,
            dataType: 'json',
            success : function(data){
                // //Xử lý dữ liệu
                // alert (data);
                 console.log(data);
                //  //lấy dữ liệu của total ...
                //  alert(data.total);

                // // alert (data);
                $(".order_num").html(data.order_num);
                $('#total-price span').text(data.total);
                $('#sub_total-'+id).text(data.sub_total);

                //truyền dữ liệu lên html
              

                
                // $(".num_order").text(data.num_order);
                // $("#sub_total").text(data.sub_total);
                // $("#total-price span").text(data.total);
                // // console.log(data);

                // $("#total-price span").text(data.total);
                // $("#sub_total").text(data.sub_total);



               
            },
            
            // Hàm check lỗi
            error:function(xhr,ajaxOptions,thrownError){
                console.warn(xhr.responseText);
                alert(xhr.status);
                alert(thrownError);
            }
            

        });
    });
   
});

//Note 
// Lỗi 404: Đường dẫn không tồn tại
// undefine index : phương thức sai (thông thường là GET vs POST)