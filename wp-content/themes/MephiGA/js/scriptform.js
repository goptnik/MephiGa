function myform_ajax_send(name,email,mess){
	jQuery.ajax({
	type: 'POST',
	url: myform_Ajax.ajaxurl,
	dataType:'json',
data:{
'name':jQuery(name).val(),
'email':jQuery(email).val(),
'mess':jQuery(mess).val(),
'nonce': myform_Ajax.nonce,
'action':'myform_send_action'
},
	success: function (data) {
if(data.error==""){
alert(data.work);
}else{
alert(data.error);
}
},
	error: function () {
alert("Ошибка соединения");
}
});
}