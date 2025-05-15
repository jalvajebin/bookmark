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


     function triggerCounter1FileInput() {
         document.getElementById('counter1_image_name').click();
     }

     function previewCounter1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('counter1ImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function triggerCounter2FileInput() {
         document.getElementById('counter2_image_name').click();
     }

     function previewCounter2(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('counter2ImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function triggerCounter3FileInput() {
         document.getElementById('counter3_image_name').click();
     }

     function previewCounter3(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('counter3ImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function triggerCounter4FileInput() {
         document.getElementById('counter4_image_name').click();
     }

     function previewCounter4(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('counter4ImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }


     function ImageInputTrigger() {
         document.getElementById('image').click();
     }

     function PreviewImage1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('ImagePreview');
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
                 $.each({
                     title: '.title-validation',
                     heading: '.heading-validation',
                     button_title: '.button_title_validation',
                     button_link: '.button_link_validation',
                     employee_description: '.employee_description_validation',
                     employee_content_1: '.employee_content_1_validation',
                     employee_content_2: '.employee_content_2_validation',
                     employee_content_3: '.employee_content_3_validation',
                     employer_description: '.employer_description_validation',
                     employer_content_1: '.employer_content_1_validation',
                     employer_content_2: '.employer_content_2_validation',
                     employer_content_3: '.employer_content_3_validation',
                     employee_image: '.employee_image_validation',
                     employer_image: '.employer_image_validation'
                 }, function(key, selector) {
                     $(selector).html(data.responseJSON.errors[key]);
                 });

             }
         });
     });

     $('#counterFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var dataContent = $(this).data('content');
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.counter.add') }}",
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
                 $('.counter_1_name_validation').html(data.responseJSON.errors.counter_1_name);
                 $('.count1_validation').html(data.responseJSON.errors.count1);
                 $('.counter1_image-validation').html(data.responseJSON.errors.counter1_image_name);
                 $('.counter_2_name_validation').html(data.responseJSON.errors.counter_2_name);
                 $('.count2_validation').html(data.responseJSON.errors.count2);
                 $('.counter2_image-validation').html(data.responseJSON.errors.counter2_image_name);
                 $('.counter_3_name_validation').html(data.responseJSON.errors.counter_3_name);
                 $('.count3_validation').html(data.responseJSON.errors.count3);
                 $('.counter3_image-validation').html(data.responseJSON.errors.counter3_image_name);
                 $('.counter_4_name_validation').html(data.responseJSON.errors.counter_4_name);
                 $('.count4_validation').html(data.responseJSON.errors.count4);
                 $('.counter4_image-validation').html(data.responseJSON.errors.counter4_image_name);
                 $('.counter_5_name_validation').html(data.responseJSON.errors.counter_5_name);
                 $('.count5_validation').html(data.responseJSON.errors.count5);
                 $('.counter_6_name_validation').html(data.responseJSON.errors.counter_6_name);
                 $('.count6_validation').html(data.responseJSON.errors.count6);
                 $('.counter_7_name_validation').html(data.responseJSON.errors.counter_7_name);
                 $('.count7_validation').html(data.responseJSON.errors.count7);
                 $('.counter_8_name_validation').html(data.responseJSON.errors.counter_8_name);
                 $('.count8_validation').html(data.responseJSON.errors.count8);
             }
         });
     });

     function testimonialAddForm(value) {
         $(".error-validation").html('');
         if (value == 1) {
             $("#id").val('');
             $("#testimonialForm")[0].reset();
             $("#testimonialModal").modal('show');
             $("#testimonialModal .heading").text("Add Testmonial");
             var currentDate = moment().format('DD-MM-YYYY');
             $(".date").val(currentDate);
         } else if (value == 2) {
             $("#testimonialModal").modal('show');
             $("#testimonialModal .heading").text("Edit Testmonial");
         } else {
             $("#testimonialModal").modal('hide');
         }

     }

     function addTestimonial(e) {
         e.preventDefault();
         e.stopPropagation();
         $(".error-validation").html('');
         var formData = new FormData($("#testimonialForm")[0]);
         formData.append('_token', "{{ csrf_token() }}");
         $.ajax({
             type: 'POST',
             url: '{{ route('admin.testimonial.add') }}',
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function() {
                 $("#loader").show();
             },
             complete: function() {
                 $("#loader").hide();
             },
             success: function(data) {
                 $("#loader").hide();
                 var message = data.message;
                 if (data.status == true) {
                     $("#testimonialForm")[0].reset();
                     $('#testimonialTable').DataTable().ajax.reload();
                     testimonialAddForm(3);
                     alertMessage('success', message);
                 } else if (data.status == false) {
                     alertMessage('error', message);
                 }
             },
             error: function(data) {
                 $("#loader").hide();
                 if (data.responseJSON?.permissionMessage) {
                     alertMessage(data.responseJSON.permissionMessage, "warning");
                 }

                 $('.heading_validation ').html(data.responseJSON.errors.heading);
                 $('.description_validation ').html(data.responseJSON.errors.description);
                 $('.image_validation ').html(data.responseJSON.errors.image);


             }
         });

     }

     function editTestimonial(id) {
         let route = "{{ route('admin.testimonial.getbyid', ':id') }}";
         route = route.replace(':id', id);
         var formData = new FormData($("testimonialForm")[0]);
         $.ajax({
             type: 'GET',
             url: route,
             success: function(data) {
                 console.log(data);
                 $(".testimonial_id").val(data.id);
                 var date = moment(data.date).format('DD-MM-YYYY');
                 $(".date").val(date);
                 $(".heading").val(data.heading).trigger('change');
                 $(".description").val(data.description).trigger('change');
                 $(".alt").val(data.alt).trigger('change');

                 if (data.images && data.images.url) {
                     $("#ImagePreview").attr("src", data.images.url);
                 } else {
                     $("#ImagePreview").attr("src", "/admin/images/no-image.png");
                 }
                 testimonialAddForm(2);
             },
             error: function(data) {
                 if (data.responseJSON?.permissionMessage) {
                     alertMessage(data.responseJSON.permissionMessage, "warning");
                 }
             }
         });
     }

     function deleteTestimonial(id) {
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
                 let route = "{{ route('admin.testimonial.delete', ':id') }}?_token={{ csrf_token() }}"
                 route = route.replace(':id', id);
                 formData = new FormData();
                 // formData.append('_token', "{{ csrf_token() }}");
                 formData.append('id', id);
                 $.ajax({
                     type: 'DELETE',
                     url: route,
                     data: formData,
                     cache: false,
                     contentType: false,
                     processData: false,
                     beforeSend: function() {
                         $("#loader").show();
                     },
                     complete: function() {
                         $("#loader").hide();
                     },
                     success: function(data) {
                         let message = data.message;
                         $("#loader").hide();
                         Swal.fire(
                             'Deleted!',
                             'Your file has been deleted.',
                             'success'
                         )
                         $('#testimonialTable').DataTable().ajax.reload();
                         alertMessage(message, 'successfully deleted');
                     },
                     error: function(data) {
                         $("#loader").hide();
                         if (data.responseJSON?.permissionMessage) {
                             alertMessage(data.responseJSON.permissionMessage, "warning");
                         }
                     }
                 });
             }
         })
     }
 </script>
