$( document ).ready(function() {


//Post Page
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
	
$('#btnpost').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val('');
	$('#title').val('');
	$('#sub_title').val('');
	CKEDITOR.instances['content'].setData('');
	$('#postimage').hide();
	$('#imagename').val('');
	
});

$( document ).ready(function() {
	if($('.err').text()!=''){
	  $('#modal1').openModal();
	  $('#postimage').hide();
	} 
});


$('.updatepost').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#postimage').show();
	$('#id').val($(this).attr('data-id'));
	$('#title').val($(this).attr('data-title'));
	$('#title').focus();
	$('#sub_title').val($(this).attr('data-sub-title'));
	$('#sub_title').focus();
	CKEDITOR.instances['content'].setData($(this).attr('data-content'));
	$('#postimage').attr('src',$(this).attr('data-image'));
	$('#imagename').val($(this).attr('data-image-name'));
	if(($(this).attr('data-status'))=='1')
	$('#filled-in-box').prop('checked', true);
	else
	$('#filled-in-box').prop('checked', false);
});


});
