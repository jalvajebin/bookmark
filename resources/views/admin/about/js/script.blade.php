 <script>
     $(document).ready(function() {
         dataTable();
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

     function Image1InputTrigger() {
         document.getElementById('image1').click();
     }

     function previewImage1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('imagePreview1');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function EmployeeImageInputTrigger() {
         document.getElementById('employee_image').click();
     }

     function employeePreviewImage1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('EmployeeImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function employerImageInputTrigger() {
         document.getElementById('employer_image').click();
     }

     function employerPreviewImage1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('employerImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     var noImage = 'admin/images/no-image.png';

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



     $('#aboutUsFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var dataContent = $(this).data('content');
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.about-us.add') }}",
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
                 var title = data.responseJSON.errors.title;
                 var description = data.responseJSON.errors.description;
                 var image1 = data.responseJSON.errors.image1;
                 var onlinePhoneNo = data.responseJSON.errors.online_support_no;


                 $('.title-validation').html(title);
                 $('.description-validation').html(description);
                 $('.image1_validation').html(image1);
                 $('.online_support_no_validation').html(onlinePhoneNo);

             }
         });
     });


     $('#learnAboutUsFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var dataContent = $(this).data('content');
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.learn-about-us.add') }}",
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
                 var title = data.responseJSON.errors.title;
                 var heading = data.responseJSON.errors.heading;
                 var button_title = data.responseJSON.errors.button_title;
                 var button_link = data.responseJSON.errors.button_link;
                 var employeeDescription = data.responseJSON.errors.employee_description;
                 var employeeContent1 = data.responseJSON.errors.employee_content_1;
                 var employeeContent2 = data.responseJSON.errors.employee_content_2;
                 var employeeContent3 = data.responseJSON.errors.employee_content_3;
                 var employerDescription = data.responseJSON.errors.employer_description;
                 var employerContent1 = data.responseJSON.errors.employer_content_1;
                 var employerContent2 = data.responseJSON.errors.employer_content_2;
                 var employerContent3 = data.responseJSON.errors.employer_content_3;
                 var employeeImage = data.responseJSON.errors.employee_image;
                 var employerImage = data.responseJSON.errors.employer_image;

                 $('.title-validation').html(title);
                 $('.heading-validation').html(heading);
                 $('.button-title-validation').html(button_title);
                 $('.button-link-validation').html(button_link);
                 $('.employee-description-validation').html(employeeDescription);
                 $('.employee-content1-validation').html(employeeContent1);
                 $('.employee-content2-validation').html(employeeContent2);
                 $('.employee-content3-validation').html(employeeContent3);
                 $('.employer-description-validation').html(employerDescription);
                 $('.employer-content1-validation').html(employerContent1);
                 $('.employer-content2-validation').html(employerContent2);
                 $('.employer-content3-validation').html(employerContent3);
                 $('.employee-image-validation').html(employeeImage);
                 $('.employer-image-validation').html(employerImage);


             }
         });
     });


     function checkEmail(message_id) {
         $("#loader").show();
         $.ajax({
             url: "/admin/get-delivery-status/" + message_id,
             type: 'get',
             beforeSend: function() {
                 $("#loader").show();
             },
             complete: function() {
                 $("#loader").hide();
             },
             success: function(response) {
                 $("#deliveryContent").empty();
                 $("#deliveryContent").html(response.view);
                 $("#deliveryModal").modal('show');
                 $("#loader").hide();

             },
             error: function(data) {
                 console.log(data);
                 $("#loader").hide();
             }
         });
     }

     function deleteContactEnquiry(e, id = '') {
         e.preventDefault();
         let ids = '';
         if (id == '') {
             ids = $("input:checkbox[class=contactIds]:checked").map(function() {
                 return this.value;
             }).get();

             if (ids.length < 1) {
                 alertMessage('Please select row', 'warning');
                 return;
             }
         } else {
             ids = [id];
         }

         Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 let route = "{{ route('contact.enquiry.delete') }}"
                 $.ajax({
                     type: 'POST',
                     url: route,
                     data: {
                         _token: "{{ csrf_token() }}",
                         ids: ids
                     },
                     dataType: "json",

                     beforeSend: function() {
                         $("#loader").show();
                     },
                     complete: function() {
                         $("#loader").hide();
                     },
                     success: function(data) {
                         $("#loader").hide();
                         if (data.success == true) {
                             Swal.fire(
                                 'Deleted!',
                                 data.message,
                                 'success'
                             )
                             $('#contactEnquiryTable').DataTable().ajax.reload();
                             $('.contactIds').prop('checked', false).removeAttr('checked');
                             alertMessage(message, 'success');
                         } else {
                             Swal.fire(
                                 'Warning!',
                                 data.message,
                                 'warning'
                             )
                         }

                     },
                     error: function(data) {
                         $("#loader").hide();
                     }
                 });
             }
         })
     }

     function exportSelect(e) {
         e.preventDefault();
         e.stopPropagation();
         let ids = $("input:checkbox[class=contactIds]:checked").map(function() {
             return this.value;
         }).get();
         if (ids.length < 1) {
             alertMessage('Please select row', 'warning');
             return;
         }

         $.ajax({
             url: "{{ route('contacts.export') }}",
             type: 'post',
             data: {
                 ids: ids,
                 _token: "{{ csrf_token() }}",
             },
             xhrFields: {
                 responseType: 'blob'
             },
             beforeSend: function() {
                 //
             },
             success: function(response) {
                 const link = document.createElement('a');
                 let url = window.URL || window.webkitURL;
                 let objectUrl = url.createObjectURL(response);
                 link.href = objectUrl;
                 link.download = 'contact-enquiries.xlsx';
                 link.click();
                 window.URL.revokeObjectURL(objectUrl);
                 $('.quoteIds').prop('checked', false);
                 $(".mulltiCheckBox").prop('checked', false);
                 // $('.sub_chk').prop('checked', false);

             },
             error: function(data) {
                 console.log(data);

             }
         });


     }
 </script>
