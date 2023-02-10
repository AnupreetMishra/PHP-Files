var studentRecords = $('#studentListing').DataTable({
	"lengthChange": false,
	"processing":true,
	"serverSide":true,		
	"bFilter": false,
	'serverMethod': 'post',		
	"order":[],
	"ajax":{
		url:"student_action.php",
		type:"POST",
		data:{action:'listStudents'},
		dataType:"json"
	},
	"columnDefs":[
		{
			"targets":[0, 4],
			"orderable":false,
		},
	],
	"pageLength": 10
});