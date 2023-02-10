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
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-search"></i> Select Class For Attendance</h3>
			</div>
			<form id="form1" action="" method="post" accept-charset="utf-8">
				<div class="box-body">						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Class</label><small class="req"> *</small>
								<select id="classid" name="classid" class="form-control" required>
									<option value="">Select</option>
									<?php echo $teacher->classList(); ?>												
								</select>
								<span class="text-danger"></span>
							</div>
						</div>																	
					</div>
				</div>
				<div class="box-footer">
					<button type="button" id="search" name="search" value="search" style="margin-bottom:10px;" class="btn btn-primary btn-sm  checkbox-toggle"><i class="fa fa-search"></i> Search</button> <br>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">					
	<form id="attendanceForm" method="post">					
		<div style="color:red;margin-top:20px;" class="hidden" id="message"></div>
		<button type="submit" id="saveAttendance" name="saveAttendance" value="Save Attendance" style="margin-bottom:10px;" class="btn btn-primary btn-sm  pull-right checkbox-toggle hidden"><i class="fa fa-save"></i> Save Attendance</button> <table id="studentList" class="table table-bordered table-striped hidden">
			<thead>
				<tr>
					<th>#</th>								
					<th>Roll No</th>	
					<th>Name</th>
					<th>Attendance</th>													
				</tr>
			</thead>
		</table>
		<input type="hidden" name="action" id="action" value="updateAttendance" />
		<input type="hidden" name="att_classid" id="att_classid" value="" />
		<input type="hidden" name="att_sectionid" id="att_sectionid" value="" />
	</form>
</div>	
    
</body>
</html>