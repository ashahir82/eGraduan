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
						for (i = 0; i < result.success.data.length && i < 20; i++) {
							trHTML += '<tr><td>' + (i+1) + '</td><td>' + result.success.data[i].name + '</td><td>' + result.success.data[i].type + '</td><td>' + result.success.data[i].course + '</td><td>' + result.success.data[i].output + '</td><td>' + result.success.data[i].convo + '</td><td><div class="btn-group btn-group-xs" role="group" aria-label="..."><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></div></td></tr>';
						}
					} else {
						trHTML += '<tr><td colspan="6">Tiada rekod ditemui.</td></tr>';
					}
					$('#searchContent').html(''); // blank before load.
					$('#searchContent').html(trHTML); // load here 
					
					//load datatable
					if ( ! $.fn.DataTable.isDataTable( '#displayresult' ) ) {
						InitOverviewDataTable();
					} else {
						$('#displayresult').DataTable().destroy();
						$('#searchContent').html(trHTML); // load here 
						InitOverviewDataTable();
					}
					
					var trHTML = '';
					trHTML = 'Carian anda terdapat ' + result.success.record + ' rekod.';
					if(result.success.record > 20) {
						trHTML += ' Keputusan memaparkan 20 rekod teratas sahaja.';
					}
					$('#search-result').html(trHTML); // load here 
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

function InitOverviewDataTable()
{
	$('#displayresult').DataTable({
		"language": {
			"sEmptyTable": "Tiada data",
			"sInfo": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
			"sInfoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
			"sInfoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
			"sInfoPostFix": "",
			"sInfoThousands": ",",
			"sLengthMenu": "Papar _MENU_ rekod",
			"sLoadingRecords": "Diproses...",
			"sProcessing": "Sedang diproses...",
			"sSearch": "Carian:",
			"sZeroRecords": "Tiada padanan rekod yang dijumpai.",
			"oPaginate": {
				"sFirst": "Pertama",
				"sPrevious": "Sebelum",
				"sNext": "Kemudian",
				"sLast": "Akhir"
			},
			"oAria": {
				"sSortAscending": ": diaktifkan kepada susunan lajur menaik",
				"sSortDescending": ": diaktifkan kepada susunan lajur menurun"
			}
		},
		"searching": false,
		"lengthChange": false,
	});
}