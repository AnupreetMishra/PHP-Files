<?php
//email
$toEmail = "";
$from = "";
$fromName = "";

// file upload settings
$attachmentUploadDir = 'uploads/';
$allowFileTypes = array('pdf','docs','docx','jpg','png','jpeg');

$postData = $uploadFile = $statusMsg =$valErr= '';
$msgClass = 'errordiv';

if(isset($post['submit'])){

    $postData = $_POST;
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if(empty($name)){
        $valErr .= 'Please enter your name.<br/>';
    }

    if(empty($email)){
        $valErr .= 'Please enter a valid email.<br/>';
    }

    if(empty($subject)){
        $valErr .= 'Please enter your subject.<br/>';
    }

    if(empty($message)){
        $valErr .= 'Please enter your message.<br/>';
    }

    if(empty($valErr)){
        $uploadStatus = 1;

        if(!empty($_FILES["attachment"]["name"])){

            $targetDir = $attachmentUploadDir;
            $fileName = basename($_FILES["attachment"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(in_array($fileType,$allowFileTypes)){
                if(move_uploaded_file($_FILES["attachment"]["tmp_name"],$targetFilePath)){
                    $uploadedfile = $targetFilePath;
                }else{
                    $uploadStatus = 0;
                    $uploadMsg = 'Sorry ,only '.implode('/',$allowTypes).'files are allowed to upload.';
                }
            }else{
                $uploadStatus = 0;
                $statusMsg = 'Sorry, only'.implode('/'.$allowFileTypes).'files are allowed to upload.';
            }
        }
        if($uploadStatus == 1){
            $emailSubject = 'Contact Request Submitted by '.$name;

            $htmlContent = '
               <h2>Contact Request Submitted</h2>
               <p><b>Name:</b> '.$name.'</p>
               <p><b>Email:</b> '.$email.'</p>
               <p><b>Subject:</b> '.$subject.'</p>
               <p><b>Message:</b> '.$message.'</p>
            ';

            $headers = "From: $fromName"."<".$row.">";

            if(!empty($uploadFile)&& file_exists($uploadedFile)){

                $semi_rand = md5(time());
                $mime_boundry = "==Multipart_Boundary_x(Semi_rand)x";

                $headers .= "\nMIME=Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . "boundry=\"
                {$mime_boundry}\"";

                $message = "--{$mime_boundry}\n" . "Content-Type: text/html; charset=\"UTF-8\"n" . 
                "Content-Transfer-Encoding: 7bit\n\n" .$htmlContent . "\n\n";

                if(is_file($uploadFile)){
                    $message .="--{$mime_boundry}\n";
                    $fp = @fopen($uploadedFile,"rb");
                    $data = @fread($fp,filesize($uploadedFile));
                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadFile).
                    "\"n" . 
                    "Content-Description: ".basename($uploadedFile)."\n" .
                    "Content-Disposition: attachment;\n" . " filename:\"".basename($uploadedFile). "\";
                    size=".filesize($uploadedFile).";\n" .
                    "Content-Transfer-Encoding:base64\n\n" .$data . "\n\n";


                }
                $message .= "--{$mime_boundry}--";
                $returnpath = "-f" .$email;

                $mail = mail($toEmail,$emailSubject, $message,$headers,$returnpath);

                @unlink($uploadedFile);

            }else{
                $headers .= "\r\n". "MIME-Version: 1.0";
                $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";

                $mail = mail($toEmail, $emailSubject,$htmlContent,$headers);
            }

            if($mail){
                $statusMsg = 'Thanks! Your contact request has been submitted successfully.';
                $msgClass = 'succdiv';
                $postData = '';

            }else{
                $statusMsg = 'Failed! Something went wrong, please try again.';
            }
        }
    }else{
        $valErr = !empty($valErr)?'<br/>'.trim($valErr, '<br/>'):'';
        $statusMsg = 'Please fill all the mandatory fields.' .$valErr;
    }

}
?>