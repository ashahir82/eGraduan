// JavaScript Document
$(function(){
	//Search
	$(document).on("click","#searchCert",function(e){
		e.preventDefault();
		$(".alert-dismissible").alert("close"); //close alert after modal close.
		$(".panel-result").hide();
		var ndp = $("#ndp").val();//capture the content of the textbox.
		var nokp = $("#nokp").val();//capture the content of the textbox.
		var name = $("#name").val();//capture the content of the textbox.
		
		if (ndp == "" && nokp == "" && name == "") { // if variable is empty
			$("#error").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Amaran!</strong> Isikan salah satu ruang di bawah.</div>');//display error message
			return false; // stop the script
		}
		
		var urlcarian="ajax/doCert.php?action=searchCert&ndp=" + ndp + "&nokp=" + nokp + "&name=" + name;
		
		$.ajax({
			url:urlcarian,//the URL
			type:'get',//method used
			async:'true',
			dataType:"json",
			beforeSend: function(){ $("#searchCert").val('Proces carian...'); },
			success:function(result){//if the connection success
				if (result.errors) {//if the result error
					var i, errText = '';
					for (i = 0; i < result.errors.length; i++) {
						errText += '<strong>Amaran!</strong> ' + result.errors[i] + '<br>';
					}
					$("#error").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + errText + '</div>');//display error message
				} else if (result.success) {//if the result success
					var i, trHTML = '';
					if (result.success.data.length != 0) {
						for (i = 0; i < result.success.data.length; i++) {
							trHTML += '<tr><td>' + (i+1) + '</td><td>' + result.success.data[i].name + '</td><td>' + result.success.data[i].intake + '</td><td>' + result.success.data[i].course + '</td><td>' + result.success.data[i].output + '</td><td>' + result.success.data[i].convo + '</td></tr>';
						}
					} else {
						trHTML += '<tr><td colspan="6">Tiada rekod ditemui.</td></tr>';
					}
					$('#searchContent').html(''); // blank before load.
					$('#searchContent').html(trHTML); // load here 
					$(".panel-result").show();
				}
			},//success
			error:function(result,error){//if the connection fail
				$("#saveApplyDetail").val('Semak');
				$("#error").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Amaran!</strong> Masalah sambungan rangkaian ke pangkalan data!</div>');
			}//error
		});//ajax
	});
})