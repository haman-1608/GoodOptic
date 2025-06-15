

function showProductItems(){  
    $.ajax({
        url:"./sanpham/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCategory(){  
    $.ajax({
        url:"viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showMaterial(){  
    $.ajax({
        url:"./phanloai/chatlieu/viewMaterial.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showTarget(){  
    $.ajax({
        url:"./phanloai/doituong/viewTarget.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showRefractive(){  
    $.ajax({
        url:"./phanloai/khucxa/viewRefractive.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showUV(){  
    $.ajax({
        url:"./phanloai/uv/viewUV.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./khachhang/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./donhang/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./donhang/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./donhang/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

//add product data
function addItems(){
    var p_name=$('#p_name').val();
    var p_desc=$('#p_desc').val();
    var p_price=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./sanpham/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./sanpham/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var brand = $('#brand').val();
    var refractive = $('#refractive').val();
    var uv = $('#uv').val();
    var target = $('#target').val();

    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('brand', brand);
    fd.append('refractive', refractive);
    fd.append('uv', uv);
    fd.append('target', target);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./sanpham/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//delete product data
function itemDelete(id){
    $.ajax({
        url:"./sanpham/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
function cartDelete(id){
    $.ajax({
        url:"./controller/deleteCartController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./phanloai/loaisanpham/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Loại sản phẩm đã được xóa thành công');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function materialDelete(id){
    $.ajax({
        url:"./phanloai/chatlieu/deleteMaterial.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Chất liệu đã được xóa thành công');
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function targetDelete(id){
    $.ajax({
        url:"./phanloai/doituong/deleteTarget.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Đối tượng đã được xóa thành công');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

function refractiveDelete(id){
    $.ajax({
        url:"./phanloai/khucxa/deleteRefractive.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('xóa thành công');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

function uvDelete(id){
    $.ajax({
        url:"./phanloai/uv/deleteUV.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('UV đã được xóa thành công');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}
