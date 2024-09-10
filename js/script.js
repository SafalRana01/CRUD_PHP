$(document).ready(function(){
    // adding users
    // Whenever i am clicking the submit button i am accessing addform id from form.php and here i am preventing the default submission of the form.
    $(document).on("submit","#addform", function(e){
        e.preventDefault();

        // ajax
        // here in ajax syntax i am having all the parameters(i.e url, type, dataType,....)
        $.ajax({
            url:"/PhpAdvanceCrud/ajax.php",
            type:"POST",
            dataType:"json",
            data: new FormData(this),

            processData:false,
            // we are inserting an image in database. so contentType should always written false. Not only image it should be written for files also
            contentType:false,
            beforeSend:function(){
                console.log("Wait.... Data is loading");
            },

            success:function(response){
                console.log(response);
                // This part is written to delete the data after successfull added. If this code is not written, even after i submitted and close then again my value will stay there. It works to clear the inputfield
                if(response){
                    // this will close the modal page after successfully submit the form 
                    $("#userModal").modal("hide");
                    // Here it will clear all the fill data that is submited and will show clear text field
                    $("#addform")[0].reset();
                }
            }, 

            error: function(request, error){
                console.log(arguments);
                console.log("Error: " + error);
                // console.log("Response Text: " + request.responseText);
                // console.log("Status: " + request.status);
                // console.log("Ready State: " + request.readyState);
            },
        });
    });
});