
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="row">					
	<form id="attendanceForm" method="post">					
		<table id="studentList" class="table table-bordered table-striped hidden">
			<thead>
				<tr>
					<th>#</th>								
					<th>Roll No</th>	
					<th>Name</th>
					<th>Attendance</th>													
				</tr>
			</thead>
		</table>					
	</form>
</div>
<script type="text/javascript" src="jquery-3.6.1.min.js"></script>
<script>
      $(document).ready(function () {
        $('#search').click(function(){
            $('#studentList').removeClass('hidden');		
            if ($.fn.DataTable.isDataTable("#studentList")) {
                $('#studentList').DataTable().clear().destroy();
            }
            var classid = $('#classid').val();		
            var attendanceDate = $('#attendanceDate').val();		
            if(classid && attendanceDate) {			
                $('#studentList').DataTable({
                    "lengthChange": false,
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url:"attendance_action.php",
                        type:"POST",				
                        data:{classid:classid, attendanceDate:attendanceDate, action:'getStudentsAttendance'},
                        dataType:"json"
                    },
                    "columnDefs":[
                        {
                            "targets":[0],
                            "orderable":false,
                        },
                    ],
                    "pageLength": 10
                });				
            }
        });
        
      });  
</script>
    
</body>
</html>