// ajax启动的时候传递tocken
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$(".post-audit").click(function(event){
	var target = $(event.target);
	var postId = target.attr('post-id');
	var status = target.attr('post-action-status');

	$.ajax({
		url: '/admin/posts/' + postId + '/status',
		method: 'POST',
		data: {'status': status},
		dataType: 'json',
		success: function(msg){
			if(msg.error != 0) {
				alert(msg.msg);
				return false;
			}
			location.reload();
		}
	});

});