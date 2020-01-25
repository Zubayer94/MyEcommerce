
$(function () {

    $(document).on("click", " #view", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        console.log(id + "---" + url);

        $.ajax({
         url: url,
         type: 'GET',
         dataType: 'JSON',
         data: {id: id},
            // { name: name, description: description, price: price, quantity: quantity, pic: image_upload },
            success:function (data) {
             if($.isEmptyObject(data) != null){
                 console.log(data.uimage);

                 $("#viewcategory").modal("show");
                // $("#bookName").text(data.data.name + "'s details :");
                 $("#catimage").attr('src', data.uimage);
                // $(".vname").text("Product Name : " + data.data.name);
                // $(".vdescription").text("Product description : " + data.data.description);
                // $(".vquantity").text("Product quantity : " + data.data.quantity);
                // $(".vprice").text("Product price : " + data.price + " ৳");
             }

            }
        });
    });


   //  function showValidationErrors(name, error) {

   //      var group = $("#form-group-" + name);
   //      group.addClass("has-error");
   //      group.find(".help-block").text(error);
   //      var border = $(".border-" + name);
   //      border.addClass("border-danger");
            
   //  }

   //  function clearValidationError(name) {
   //      var group = $("#form-group-" + name);
   //      group.removeClass("has-error");
   //      group.find(".help-block").text("");
   //      var border = $(".border-" + name);
   //      border.removeClass("border-danger");
        
   //  }
   //  $("#name, #description, #price, #quantity").on("keyup", function () {
   //      clearValidationError($(this).attr('id').replace("#", ""))
   //  });
    
   //  $("#dataForm").on("submit",function (e) {
   //      e.preventDefault();
   //      var from = $(this);
   //      var url = from.attr("action");
   //      var type = from.attr("method");
   //      var data = from.serialize();
   //      // var name = $("#name").val();
   //      // var description = $("#description").val();
   //      // var price = $("#price").val();
   //      // var quantity = $("#quantity").val();

   //      // let image_upload = new FormData();
   //      // let TotalImages = $("#pic")[0].files.length;  //Total Images
   //      // console.log( TotalImages  );
   //      // let images = $("#pic")[0];  
   //      // for (let i = 0; i < TotalImages; i++) {
   //      // image_upload.append('images[]', images.files[i]);
   //      // }

   //      console.log( data  );

   //      $.ajax({
   //      	url: url,
   //      	type: type,
   //      	dataType: 'JSON',
   //      	data: data,
   //          // { name: name, description: description, price: price, quantity: quantity, pic: image_upload },
			// success:function (data) {
			// 	if(data == "success"){
			// 		$("#editProuctModal").model("hide");
			// 	}
			// 	else{
   //                  for (let i in data) {
   //                      showValidationErrors(i, data[i][0])
   //                  }
   //              }

			// }
   //      });
   //  });

});