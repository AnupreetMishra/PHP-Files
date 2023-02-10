<?php
    $student = new Student($db);

    if(!empty($_POST['action']) && $_POST['action'] == 'listStudents') {
        $student->listStudents();
    }


    public function listStudents(){
		
        $sqlQuery = "SELECT s.id, s.name, s.roll_no, c.name as class_name
        FROM ".$this->studentTable." as s 
        LEFT JOIN ".$this->classTable." as c ON s.class = c.id ";
        
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'WHERE (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';			
            $sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';			
            $sqlQuery .= ' OR c.name LIKE "%'.$_POST["search"]["value"].'%") ';								
        }
        
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY s.id DESC ';
        }
        
        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->get_result();	
        
        $stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->studentTable);
        $stmtTotal->execute();
        $allResult = $stmtTotal->get_result();
        $allRecords = $allResult->num_rows;
        
        $displayRecords = $result->num_rows;
        $records = array();		
        while ($student = $result->fetch_assoc()) { 				
            $rows = array();			
            $rows[] = $student['id'];
            $rows[] = ucfirst($student['name']);
            $rows[] = $student['roll_no'];		
            $rows[] = $student['class_name'];				
            $rows[] = '<button type="button" name="view" id="'.$student["id"].'" class="btn btn-info btn-xs view"><span class="glyphicon glyphicon-file" title="View"></span></button>';
            $records[] = $rows;
        }
        
        $output = array(
            "draw"	=>	intval($_POST["draw"]),			
            "iTotalRecords"	=> 	$displayRecords,
            "iTotalDisplayRecords"	=>  $allRecords,
            "data"	=> 	$records
        );
        
        echo json_encode($output);
    }



    $student = new Student($db);

    if(!empty($_POST['action']) && $_POST['action'] == 'updateAttendance') {
        $student->updateAttendance();
    }



    public function updateAttendance(){	
        $attendanceYear = date('Y'); 
        $attendanceMonth = date('m'); 
        $attendanceDay = date('d'); 
        $attendanceDate = $attendanceYear."/".$attendanceMonth."/".$attendanceDay;	
        
        $sqlQuery = "SELECT * FROM ".$this->attendanceTable." 
            WHERE class_id = '".$_POST["att_classid"]."' AND attendance_date = '".$attendanceDate."'";			
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        $attendanceDone = $result->num_rows;		
        
        if($attendanceDone) {
            foreach($_POST as $key => $value) {				
                if (strpos($key, "attendencetype_") !== false) {
                    $student_id = str_replace("attendencetype_","", $key);
                    $attendanceStatus = $value;					
                    if($student_id) {
                        $updateQuery = "UPDATE ".$this->attendanceTable." SET status = '".$attendanceStatus."'
                        WHERE student_id = '".$student_id."' AND class_id = '".$_POST["att_classid"]."' AND attendance_date = '".$attendanceDate."'";						
                        
                        $stmt = $this->conn->prepare($updateQuery);							
                        $stmt->execute();
                        
                    }
                }				
            }	
            echo "Attendance updated successfully!";			
        } else {
            foreach($_POST as $key => $value) {				
                if (strpos($key, "attendencetype_") !== false) {
                    $student_id = str_replace("attendencetype_","", $key);
                    $attendanceStatus = $value;					
                    if($student_id) {
                        $insertQuery = "INSERT INTO ".$this->attendanceTable."(student_id, class_id, status, attendance_date) 
                        VALUES ('".$student_id."', '".$_POST["att_classid"]."', '".$attendanceStatus."', '".$attendanceDate."')";
                        
                        $stmt = $this->conn->prepare($insertQuery);							
                        $stmt->execute();
                    }
                }
                
            }
            echo "Attendance save successfully!";
        }	
    }


    if(!empty($_POST['action']) && $_POST['action'] == 'getStudentsAttendance') {
        $student->classId = $_POST["classid"];
        $student->attendanceDate = $_POST["attendanceDate"];
        $student->getStudentsAttendance();
    }


    public function getStudentsAttendance(){		
        if($this->classId && $this->attendanceDate) {
            $sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.status
                FROM ".$this->studentTable." as s
                LEFT JOIN ".$this->attendanceTable." as a ON s.id = a.student_id
                WHERE s.class = '".$this->classId."' AND a.attendance_date = '".$this->attendanceDate."'";
            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
                $sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';	
                $sqlQuery .= ' OR a.attendance_date LIKE "%'.$_POST["search"]["value"].'%" )';
            }
            if(!empty($_POST["order"])){
                $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
            } else {
                $sqlQuery .= 'ORDER BY s.id DESC ';
            }
            if($_POST["length"] != -1){
                $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }	
            
            
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->get_result();	
                        
            $stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->attendanceTable);
            $stmtTotal->execute();
            $allResult = $stmtTotal->get_result();
            $allRecords = $allResult->num_rows;
        
            $displayRecords = $result->num_rows;		
            
            $studentData = array();				
            while ($student = $result->fetch_assoc()) {			
                $attendance = '';
                if($student['status'] == 'present') {
                    $attendance = '<small class="label label-success">Present</small>';
                } else if($student['status'] == 'late') {
                    $attendance = '<small class="label label-warning">Late</small>';
                } else if($student['status'] == 'absent') {
                    $attendance = '<small class="label label-danger">Absent</small>';
                } else if($student['status'] == 'half_day') {
                    $attendance = '<small class="label label-info">Half Day</small>';
                }				
                $studentRows = array();			
                $studentRows[] = $student['id'];				
                $studentRows[] = $student['roll_no'];
                $studentRows[] = $student['name'];		
                $studentRows[] = $attendance;					
                $studentData[] = $studentRows;
            }
            
            $output = array(
                "draw"	=>	intval($_POST["draw"]),			
                "iTotalRecords"	=> 	$displayRecords,
                "iTotalDisplayRecords"	=>  $allRecords,
                "data"	=> 	$studentData
            );
            echo json_encode($output);
            
        }
    }	




?>