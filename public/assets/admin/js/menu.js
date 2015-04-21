$( document ).ready(function() {

//Menu Page	
$(function(){
	var segment_str = window.location.pathname;
	var segment_array = segment_str.split( '/' );
	var second = segment_array[segment_array.length - 2];
	var last = segment_array[segment_array.length - 1];
	var t  = '/'+second+'/'+last;
	$('.sidebar1 li a').each(function(){
		var url = $(this).attr('href');
		if(url.trim()==t.trim()){
			$(this).parent().addClass('active');
			}
			});
});	

$('#btnmenu').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val('');
	$('#name').val('');
	$('#path').val('');
	$('#filled-in-box').val('');
	
	
});

$( document ).ready(function() {
	if($('.err').text()!=''){
	  $('#modal1').openModal();
	} 
});

$('.updatemenu').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val($(this).attr('data-id'));
	$('#name').val($(this).attr('data-name'));
	$('#name').focus();
	$('#path').val($(this).attr('data-path'));
	$('#path').focus();
	if(($(this).attr('data-status'))=='1')
	$('#filled-in-box').prop('checked', true);
	else
	$('#filled-in-box').prop('checked', false);
});


});
