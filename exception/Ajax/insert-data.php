<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax tutorial</title>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Add records with php & ajax</h1>

            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                First Name: <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Last Name: <input type="text" id="lname">
                <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
                
                

            </td>
        </tr>

    </table>

    <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            function loadTable()
            {
                $.ajax
                ({
                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data)
                    {
                       $("#table-data").html(data); 
                    }
                });
            }
            
            loadTable();

            $("#save-button").on("click",function(e){

                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                if (fname == "" || lname == "") 
                {
                    $("#error-message").slideUp();

                    
                }
                else
                {
                    $.ajax
                    ({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {first_name:fname,last_name:lname},
                        success: function(data)
                        {
                            if(data == 1)
                            {
                                loadTable();
                                $("#addForm").trigger("reset");
                                $("#success-message").html("Data Inserted successfully.").slideDown();
                                $("#error-message").slideUp();
                            }
                            else{
                                $("#error-message").html("Can not save the record.").slideDown();
                                $("#success-message").slideUp();
                            
                            }
                        
                        }
                    });

                }

             

                
            
            
            });

            $(document).on("click",".delete-btn",function(){
                var studentId = $(this).data("id");
                var element = this;

                $.ajax({
                    url: "ajax-delete.php",
                    type:"POST",
                    data:{id: studentId},
                    success:function(data){
                        alert(data);
                        
                        if(data==1){
                            $(element).closest("tr").fadeOut();
                        }
                        else{
                            $("#error-messagge").html("Can not delete record.").slideDown();
                            $("#success-message").slideUp();

                        }
                    }
                });
            });

            
        });
    </script>

    
</body>
</html>