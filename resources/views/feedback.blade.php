@include('layouts.head')
<title>Service Feedback</title>
<link rel="stylesheet" href="feedback_res/css/style.css">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZMJCGHRR4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QZMJCGHRR4');
</script>

<body>
    @include('layouts.navbar')

    <div class="alert alert-success" id="success-alert" style="display: none;">

    </div>

    <div class="container mainmargin">
        <div class="row">
            <section class="feedback-form" id="feedback-form" style="display: block">
                <div class="download-pdf"><a href="{{ asset('downloads/feedback.pdf') }}" download><img
                            class="download-pdf-image" src="{{ asset('feedback_res/img/pdf.webp') }}"
                            alt=""></a></div>
                <h2 style="text-align: center;">Customer Feedback</h2>
                <form action="/give-feedback" method="POST">
                    @csrf
                    <!--Rating Questions-->
                    <label for="name">Name of the Event</label><br>
                    <select name="name" id="name">
                        @if ($events->isempty())
                            <option selected disabled>No events available</option>
                        @else
                            @foreach ($events as $event)
                                <option value="{{ $event->name }}">
                                    {{ $event->name }}</option>
                            @endforeach
                            @foreach ($pastevents as $pastevent)
                                <option value="{{ $pastevent->name }}">
                                    {{ $pastevent->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="venue">Please rate the overall organization and logistics of the training
                        sessions
                        (e.g., venue, scheduling, facilities).
                    </label>
                    <select name="venue" id="" required>
                        <option value="1">1 - Disorganized</option>
                        <option value="2">2 - Kind of Organized</option>
                        <option value="3">3 - Fair</option>
                        <option value="4">4 - Adequate</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                    <label for="comprehensiveness">How satisfied are you with the clarity and comprehensiveness of
                        the
                        topics covered during the training sessions?
                    </label>
                    <select name="comprehensiveness" id="" required>
                        <option value="1">1 - Confusing</option>
                        <option value="2">2 - Somewhat Clear</option>
                        <option value="3">3 - Fair</option>
                        <option value="4">4 - Clear</option>
                        <option value="5">5 - Very Comprehensive</option>
                    </select>
                    <label for="relevance">How would you rate the relevance of the topics covered in our training
                        sessions to your financial goals and needs?
                    </label>
                    <select name="relevance" id="" required>
                        <option value="1">1 - Irrelevant</option>
                        <option value="2">2 - Somewhat relevant</option>
                        <option value="3">3 - Moderately relevant</option>
                        <option value="4">4 - Very relevant</option>
                        <option value="5">5 - Extremely relevant</option>
                    </select>
                    <label for="recommendation">How likely are you to recommend Zurit Consulting's trainings to
                        others
                        based on your experience?
                    </label>
                    <select name="recommendation" id="" required>
                        <option value="1">1 - Unlikely</option>
                        <option value="2">2 - Less Likely</option>
                        <option value="3">3 - Neutral</option>
                        <option value="4">4 - Likely</option>
                        <option value="5">5 - Very Likely</option>
                    </select><br>
                    <label for="return_client">How likely are you to attend other Zurit Consulting's trainings based
                        on
                        your experience?
                    </label><br>
                    <select name="return_client" id="" required>
                        <option value="1">1 - Unlikely</option>
                        <option value="2">2 - Less Likely</option>
                        <option value="3">3 - Neutral</option>
                        <option value="4">4 - Likely</option>
                        <option value="5">5 - Very Likely</option>
                    </select>
                    <label for="value_for_money">Please rate the value for money of the financial training and
                        services
                        provided by Zurit Consulting.
                    </label><br>
                    <select name="value_for_money" id="" required>
                        <option value="1">1 - No Value</option>
                        <option value="2">2 - Poor Value</option>
                        <option value="3">3 - Fair Value</option>
                        <option value="4">4 - Good Value</option>
                        <option value="5">5 - Excellent Value</option>
                    </select><br>

                    <!--Open ended Questions-->
                    <label for="valuable_aspect">What aspects of our training sessions did you find most valuable?
                    </label>
                    <textarea rows="4" type="text" name="valuable_aspect" required></textarea>
                    <label for="improvement">Is there anything specific that you feel could be improved about our
                        training programs?
                    </label>
                    <textarea rows="4" type="text" name="improvement" required></textarea>
                    <label for="suggestion">Are there any additional topics or areas of interest you would like to
                        see
                        covered in future training sessions?</label>
                    <textarea rows="4" type="text" name="suggestion" required></textarea>
                    <br><label for="fav_trainor">Who was your favourite trainor/trainors?</label><br>
                    <textarea rows="4" type="text" name="fav_trainor" required></textarea>
                    <div class="d-flex justify-content-center g-recaptcha" data-sitekey="{{ env('RECAPTCHA_API_KEY') }}"
                        data-action="SendContact"></div>
                    <button class="feedback-button" type="submit">Submit</button>
                </form>
            </section>
        </div>
    </div>
    </div>

    @include('layouts.footer')

    @include('layouts.foot')

    <script>
        document.getElementById('feedback-form').addEventListener('submit', function(e) {
            // e.preventDefault();
            grecaptcha.enterprise.ready(async function() {
                const recaptchaKey = "{{ env('RECAPTCHA_KEY') }}";
                const token = await grecaptcha.enterprise.execute(recaptchaKey, {
                    action: 'submit'
                });
                // Add the token to the form
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'g-recaptcha-response';
                input.value = token;
                document.getElementById('feedback-form').appendChild(input);
                // Submit the form
                document.getElementById('feedback-form').submit();
            });
        });

        $('#feedback-form').on('submit', function(e) {
            $.ajax({
                url: '/give-feedback', // Replace with your route
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Show the alert box with the message
                    $('#success-alert').text(response.message).fadeIn('fast');

                    // Hide the alert box after the specified duration
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                    }, response.duration);
                }
            });
        });
    </script>
</body>

</html>
