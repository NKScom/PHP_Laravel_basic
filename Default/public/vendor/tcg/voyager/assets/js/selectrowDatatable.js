$(function(){
	var id_arr=[];
	$("#dataTable #check_all").click(function () {
        if ($("#dataTable #check_all").is(':checked')) {
            $("tbody input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });   
        } else {
            $("#dataTable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

	$("#trash_dataTable #check_all").click(function () {
        if ($("#trash_dataTable #check_all").is(':checked')) {
            $("tbody input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });   
        } else {
            $("#trash_dataTable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $('#apply').click(function(){
    	var action = $('#select_action').val(),
    		url = window.location.href;
		$("#dataTable tbody input[type=checkbox]").each(function () {
           	if ($(this).is(":checked")) {
		       	id_arr.push($(this).attr('id'));
		   	}
        });
    	if(action==0){
    		location.reload();
    	}
    	if(action==1){
    		var r = confirm("Do you want delete selected post!"),
    			url=url+"/deleteSelect";
    		if (r == true) {
		        $.ajax({
		        	type: 'POST',
		        	url:url,
					data:{select_id:id_arr,'_token': $('input[name=_token]').val()},
					success: function(result){
						if(result=='success'){
                            location.reload();
                        }
					}		        	
		        });
		    }
    	}
    });

	$('#trash_apply').click(function(){
    	var action = $('#select_trash_action').val(),
    		url = window.location.href;
		$("#trash_dataTable tbody input[type=checkbox]").each(function () {
           	if ($(this).is(":checked")) {
		       	id_arr.push($(this).attr('id'));
		   	}
        });
    	if(action==0){
    		location.reload();
    	}
    	if(action==1){
    		var r = confirm("Do you want remove selected post!"),
    			url=url+"/removeSelect";
    		if (r == true) {
		        $.ajax({
		        	type: 'POST',
		        	url:url,
					data:{select_id:id_arr,'_token': $('input[name=_token]').val()},
					success: function(result){
						if(result=='success'){
                            location.reload();
                        }
					}		        	
		        });
		    }
    	}
		if(action==2){

			var	url=url+"/restoreSelect";

			$.ajax({
				type: 'POST',
				url:url,
				data:{select_id:id_arr,'_token': $('input[name=_token]').val()},
				success: function(result){
					if(result=='success'){
						location.reload();
					}
				}		        	
			});
    	}
    });
});