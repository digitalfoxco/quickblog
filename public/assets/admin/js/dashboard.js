$( document ).ready(function() {

//Dashboard Page	
$(function(){
	var segment_str = window.location.pathname;
	var segment_array = segment_str.split( '/' );
	var second = segment_array[segment_array.length - 2];
	var last = segment_array[segment_array.length - 1];
	var t  = '/'+second+'/'+last;
	$('.sidebar1 ul li a').each(function(){
		var url = $(this).attr('href');
		if(url.trim()==t.trim()){
			$(this).parent().addClass('active');
			}
			});
});

});
