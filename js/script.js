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
            beforSend:function(){
                console.log("Wait.... Data is loading");
            },

            success:function(){
                console.log(response);
            }, 

            error:function(request,error){
                console.log(arguments);
                console.log("Error"+error);
            },
        });
    });
});