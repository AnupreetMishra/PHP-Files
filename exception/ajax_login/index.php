<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form autocomplete="off" id="myform">
            <div class="banner">

            </div>
            <h1>Create an account</h1>
            <div class="form-message"></div>

            <div class="row">
                <div class="field column">
                    <label>First Name:</label>
                    <input type="text" name="firstname">
                </div>

                <div class="field column">
                    <label>Last Name:</label>
                    <input type="text" name="lastname">
                </div>

                <div class="field column">
                    <label>Email:</label>
                    <input type="email" name="email">
                </div>
                <div class="field column">
                    <label>Password:</label>
                    <input type="text" name="password">
                </div>

                
                <div class="field column">
                    <label>Upload Picture</Picture>:</label>
                    <input type="file" name="file">
                </div>

                <div class="field column">
            
                    <input type="submit" name="submit-btn" value="Sign-up">
                </div>

                
            </div>
        </form>
    </div>


    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myform").on('submit',function(e){
                e.preventDefault();
                
                var data = $('form').serialize();
                $.ajax({
                    type:"POST",
                    url:"signup.php",
                    data:data,

                        success:function(response){
                        alert(response);
                        $(".form-message").css("display","block");
                        if(response.status == 1){
                            $("#myform")[0].reset();
                            $(".form-message").html('<p>' + response.message + '</p>');
                            


                        }else{
                            $(".form-message").css("display","block");

                            $(".form-message").html('<p>' + response.message + '</p>');
                        }
                    }

                });
            });

            //file validation
            $("#file").change(function(){
                var file = this.file[0];
                var fileType = file.type;
                var match = ['image/jpeg', 'image/jpg', 'image/png'];

                if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
                    alert("Sorry, only JPEG,JPG and PNG files are allowed to upload");
                    $("#file").val('');
                    return false;
                }
            });


        });

    </script>
</body>
</html>