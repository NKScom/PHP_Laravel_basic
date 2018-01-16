$(function(){
	$('#advancesf').hide();
	$('#show_advancesf').on('click',function(){
		$('#advancesf').fadeToggle( "medium", "linear" );
	});
	$('input[name=rowSearch]').on('change',function(){
		var id = $(this).data('search');
		alert(id);
	})
})