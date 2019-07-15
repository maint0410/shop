

$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});

	$('div.alert').fadeOut(3000);

	$('#addImageDetails').click(function(){
		$("#insert").append(
			'<br/><div class="form-group"><input type="file" name="fProductDetail[]"></div>'
			);
	});

	$('.edit-cate').slideUp();

	$('a#del_img_demo').on('click',function(){
		var url = "http://localhost/shop/public/admin/product/delImage/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr("idHinh");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false, 
			data: {"_token": _token,"idHinh":idHinh,"urlHinh":img},
			success: function(data){
				if (data.result == true) {
					$("#"+rid).remove();
				}else{
					alert("Lỗi");
				}
			},
		});
	});
});

function DeleteConfirm(msg){
	if (confirm(msg)) {
		return true;
	}
	return false;
}
