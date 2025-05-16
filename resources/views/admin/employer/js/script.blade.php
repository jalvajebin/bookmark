 <script>
     $(document).ready(function() {
         dataTable();

         $('#date').datetimepicker({
             format: 'DD-MM-YYYY',
         });

         $('#tabs-nav li:first-child').addClass('active');
         $('.tab-content').hide();
         $('.tab-content:first').show();
         $('#tabs-nav li').click(function() {
             $('#tabs-nav li').removeClass('active');
             $(this).addClass('active');
             $('.tab-content').hide();
             var activeTab = $(this).find('a').attr('href');
             $(activeTab).fadeIn();
             return false;
         });
     });

     $('#bannerFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.banner.add') }}",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#loader").hide();
                 var message = data.message;
                 if (data.status == true) {
                     alertMessage('success', message);
                 } else if (data.status == false) {
                     alertMessage('error', message);
                 }
             },
             error: function(data) {
                 console.log(data);
                 $("#loader").hide();
                 var banner_title = data.responseJSON.errors.banner_title;
                 var banner_image = data.responseJSON.errors.banner_image;

                 $('.banner_title-validation').html(banner_title);
                 $('.banner_image-validation').html(banner_image);
             }
         });
     });

     function triggerBanner1FileInput() {
        document.getElementById('banner1-input').click();
    }

    function previewBanner1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('bannerPreview1');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }


     $('#employerContactFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var dataContent = $(this).data('content');
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.employer-contact.add') }}",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,

             success: function(data) {
                 $("#loader").hide();
                 var message = data.message;
                 if (data.status == true) {
                     alertMessage('success', message);
                 } else if (data.status == false) {
                     alertMessage('error', message);
                 }
             },
             error: function(data) {
                 $("#loader").hide();
                 var heading = data.responseJSON.errors.heading;
                 var description = data.responseJSON.errors.description;
                 var phone = data.responseJSON.errors.phone_no;


                 $('.heading-validation').html(heading);
                 $('.description_validation').html(description);
                 $('.phone_no_validation').html(image1);
               

             }
         });
     });

     $('#weRecruitForFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var dataContent = $(this).data('content');
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.we-recruit-for.add') }}",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,

             success: function(data) {
                 $("#loader").hide();
                 var message = data.message;
                 if (data.status == true) {
                     alertMessage('success', message);
                 } else if (data.status == false) {
                     alertMessage('error', message);
                 }
             },
             error: function(data) {
                 $("#loader").hide();
                 var heading = data.responseJSON.errors.heading;
                 var description = data.responseJSON.errors.description;

                 $('.heading-validation').html(heading);
                 $('.description_validation').html(description);
             }
         });
     });
 </script>
