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


     function triggerContactBanner1FileInput() {
         document.getElementById('banner-contact-input').click();
     }

     function previewContactBanner1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('ContactPreview1');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function ImageInputTrigger() {
         document.getElementById('team_image').click();
     }

     function PreviewImage1(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('ImagePreview');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }





     function triggerImageFileInput() {
         document.getElementById('image').click();
     }

     function previewImage(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('Image');
             output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }

     function triggerWhatImageFileInput() {
         document.getElementById('what_image').click();
     }

     function previewWhatImage(event) {
         const reader = new FileReader();
         reader.onload = function() {
             const output = document.getElementById('whatImage');
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

     $('#contactBannerFormSubmit').submit(function(e) {
         e.preventDefault();
         $("#loader").show();
         var formData = new FormData(this);
         $('.error-validation').html('');
         $.ajax({
             type: 'POST',
             url: "{{ route('admin.banner-contact.add') }}",
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

                 $('.contact-title-validation').html(data.responseJSON.errors.banner_title);
                 $('.contact-description-validation').html(data.responseJSON.errors.description);
                 $('.contact-image-validation').html(data.responseJSON.errors.banner_image);
             }
         });
     });

     $('#formSubmit').on('submit', function(e) {
         e.preventDefault();
         $("#loader").show();
         var formData = new FormData(this);
         $('.error-validation').html('');

         $.ajax({
             type: 'POST',
             url: "{{ route('store') }}",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#loader").hide();
                 alertMessage(data.status ? 'success' : 'error', data.message);
             },
             error: function(data) {
                 $("#loader").hide();
                 const errors = data.responseJSON.errors;
                 $('.title-validation').html(errors.title);
                 $('.why-description-validation').html(errors.description);
                 $('.icon-validation').html(errors.icon);
             }
         });
     });

     $('#whatWedoFormSubmit').on('submit', function(e) {
         e.preventDefault();
         $("#loader").show();
         var formData = new FormData(this);
         $('.error-validation').html('');


         $.ajax({
             type: 'POST',
             url: "{{ route('storeWhatWeDo') }}",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#loader").hide();
                 alertMessage(data.status ? 'success' : 'error', data.message);
             },
             error: function(data) {
                 $("#loader").hide();
                 const errors = data.responseJSON.errors;
                 $('.title-validation').html(errors.title);
                 $('.type-validation').html(errors.type);
                 $('.what-description-validation').html(errors.description);
                 $('.icon-validation').html(errors.image);
             }
         });

     });

     function teamAddForm(value) {
         $(".error-validation").html('');
         if (value == 1) {
             $("#id").val('');
             $("#teamForm")[0].reset();
             $("#teamModal").modal('show');
             $("#teamModal .heading").text("Add Team");
         } else if (value == 2) {
             $("#teamModal").modal('show');
             $("#teamModal .heading").text("Edit Team");
         } else {
             $("#teamModal").modal('hide');
         }

     }

     function addTeam(e) {
         e.preventDefault();
         e.stopPropagation();
         $(".error-validation").html('');
         var formData = new FormData($("#teamForm")[0]);
         formData.append('_token', "{{ csrf_token() }}");
         $.ajax({
             type: 'POST',
             url: '{{ route('meet-our-team.team.store') }}',
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
                     $("#teamForm")[0].reset();
                     $('#teamTable').DataTable().ajax.reload();
                     teamAddForm(3);
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
                 var title = data.responseJSON.errors.title;
                 $('.title_validation ').html(title);


             }
         });

     }

     function editTeam(id) {
         let route = "{{ route('meet-our-team.team.edit', ':id') }}";
         route = route.replace(':id', id);
         var formData = new FormData($("teamForm")[0]);
         $.ajax({
             type: 'GET',
             url: route,
             success: function(data) {
                 console.log(data.id);
                 $(".team_id").val(data.id);
                 $(".name").val(data.name).trigger('change');
                 $(".description").val(data.description).trigger('change');
                 $(".facebook").val(data.facebook).trigger('change');
                 $(".instagram").val(data.instagram).trigger('change');
                 $(".linkedin").val(data.linkedin).trigger('change');
                  if (data.team_images && data.team_images.url) {
                     $("#ImagePreview").attr("src", data.team_images.url);
                 } else {
                     $("#ImagePreview").attr("src", "/admin/images/no-image.png");
                 }
                 teamAddForm(2);
             },
             error: function(data) {
                 if (data.responseJSON?.permissionMessage) {
                     alertMessage(data.responseJSON.permissionMessage, "warning");
                 }
             }
         });
     }

     function deleteTeam(id) {
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
                 let route = "{{ route('delete-team', ':id') }}?_token={{ csrf_token() }}"
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
                         $('#teamTable').DataTable().ajax.reload();
                         alertMessage(message, 'successfully deleted');
                     },
                     error: function(data) {
                         $("#loader").hide();
                         if (data.responseJSON?.permissionMessage) {
                             alertMessage(data.responseJSON.permissionMessage,
                                 "warning");
                         }
                     }
                 });
             }
         })
     }
 </script>
