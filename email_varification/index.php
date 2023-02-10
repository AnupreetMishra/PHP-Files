<?php
include ('submit.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>

    <div class="container">
        <h1>Contact form with mail verification</h1>
        <div class="form-wrapper">
            <form method="post" action=""  enctype="multipart/form-data" class="animate-form">
                <h4 class="headt">Contact Us</h4>
                <?php if(!empty($statusMsg)){ ?>
                    <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?
                    ></p>
                <?php } ?>

                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo !empty($postData['name])?$postData['name']:''; ?>" placeholder="Name" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="" placeholder="Email" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="subject" class="form-control" value="" placeholder="Subject" required="">
                </div>

                <div class="form-group">
                    <textarea  name="message" class="form-control"  placeholder="Write your message here" required=""></textarea>
                </div>

                <div class="form-group">
                    <input type="file" name="attachment" class="form-control" required="">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Submit">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>