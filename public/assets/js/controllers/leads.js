 var TIMERS = {};
    // Save the information from the form by sending it to the server via an
    // AJAX GET request. If you have a lot of data you could use POST here
    // instead
    //
    function saveformAuto()
    {
        // Get the form information and put it in the opt variable
        var opt = {
            first_name: document.getElementById('first_name').value,
            last_name: document.getElementById('last_name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            address: document.getElementById('address').value,
            image_path: document.getElementById('image_path').value,
            
        };

        // If there's already a timer - cancel it (we're about to create a
        // new one). This means that we don't register many new timers
        if (TIMERS.SAVEDATA) {
            clearTimeout(TIMERS.SAVEDATA);
        }

        // Create the new timer - which runs after a delay of a second
        TIMERS.SAVEDATA = setTimeout(function ()
        {
             var token = $('input[name="_token"]').val();
             var form_data = new FormData();
             form_data.append('first_name', opt.first_name);
             form_data.append('last_name', opt.last_name);
             form_data.append('email', opt.email);
             form_data.append('phone', opt.phone);
             form_data.append('address', opt.address);
             form_data.append('image_path', opt.image_path);
            // Trigger the AJAX GET request that passes the information
            // to the server (using jQuery)
            $.ajax({
                url:  "lead-auto-submit",
               data: form_data,
                
                 dataType:"JSON",
                type: "POST",
            headers: {'X-CSRF-TOKEN': token},
            contentType: false,
            // cache: false,
            processData:false,
            success: function(data) {
              alert("LINO")
            }
           });       
            


            // Fade out the note after 5 seconds
            // setTimeout(function ()
            // {
            //     $('#savednote').animate({
            //         opacity: 0
            //     }, 250);
            // }, 5000);


            // Now, at the end of the timer function, clear any reference
            // that we have of the timer
            TIMERS.SAVEDATA = null;
        }, 1000);
    }
$(document).ready(function(){

    $('#file_footage').change(function(e){
        e.preventDefault();
        // var formData = new FormData($(this)[0]);
         if ($(this).val() != '') {
            upload(this);

        }
         });
  
function upload(img) {
 
    var form_data = new FormData();
    form_data.append('file', img.files[0]);
    var image_path='';
      var token = $('input[name="_token"]').val();
      // form_data.append('_token', '{{csrf_token()}}');
      console.log(form_data);
        $.ajax({
            url:  "lead-upload",
            type: "POST",
            headers: {'X-CSRF-TOKEN': token},
            dataType:"JSON",
            data:   form_data,
            contentType: false,
            // cache: false,
            processData:false,
            success: function(data) {
                image_path=data.data;
                $("#image_path").val(image_path);
            }

         });
    }

    // Create the TIMERS object
    

   
   
});