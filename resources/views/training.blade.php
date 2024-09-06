<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(".category_btn").click(function() {
            // Remove active class from all buttons
            $(".category_btn").removeClass("active");

            // Add active class to clicked button
            $(this).addClass("active");

            var category = $(this).attr("id");
            $(".category_card").hide();
            $("." + category).show();
        });

        // Trigger click event on individual button
        $("#individual").click();

        // Handle the enroll form submission
        $('#enrollForm').on('submit', function(e) {
            e.preventDefault();

            var trainingName = $('.modal.show .modal-title').text();

            $.ajax({
                url: '/enroll',
                type: 'POST',
                data: {
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    training: trainingName,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle the response from the server
                    $('#success-message').css('display', 'block');
                    setTimeout(function() {
                        $('#success-message').css('display', 'none');
                    }, 2000);
                    $('#modal_enroll').modal('hide');

                    // Clear the form fields
                    $('#enrollForm')[0].reset();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                }
            });

        });
    });
</script>
