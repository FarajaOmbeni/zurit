<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>T&C's Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('terms/style.css') }}?v={{ time() }}">
    <link rel="icon" href="{{ asset('img/ico_logo.webp') }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>
    <div class="main_container">
        <div class="inner_container">
        <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-white2.webp') }}" alt="">
            </a>
        <h2>Terms and Conditions</h2>
    <p>
    These terms and conditions outline the rules and regulations for the use of Zurit Consulting's Website, located at <a href="/">zuritconsulting.com</a><br> 
    By accessing this website we assume you accept these terms and conditions. Do not continue to use Zurit Consulting if you do not agree to take all of the terms and conditions stated on this page.
    </p>

    <p><br>The following terminology applies to these Terms and Conditions, 
    Privacy Statement and Disclaimer Notice and all Agreements: 
    "Client", "You" and "Your" refers to you, the person log on this website and compliant 
    to the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", 
    refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. 
    All terms refer to the offer, acceptance and consideration of payment necessary to undertake the 
    process of our assistance to the Client in the most appropriate manner for the express purpose of 
    meeting the Client's needs in respect of provision of the Company's stated services, in accordance
     with and subject to, prevailing law of ke. Any use of the above terminology or other words in the singular,
      plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.
     </p>
    
     <!-- COOKIES -->
     <h2>Cookie Policy</h2>
     <p>
     We employ the use of cookies. 
     By accessing Zurit Consulting, you agreed to use cookies in agreement with the Zurit Consulting's Privacy Policy.
     </p>

     <p>
     Most interactive websites use cookies to let us retrieve the user's details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. 
     Some of our affiliate/advertising partners may also use cookies.
     </p>

     <!-- LICENSE -->
     <h2>License</h2>
     <p>
     Unless otherwise stated, Zurit Consulting and/or its licensors own the intellectual property rights for all material on Zurit Consulting. All intellectual property rights are reserved. 
     You may access this from Zurit Consulting for your own personal use subjected to restrictions set in these terms and conditions.<br> 
     <br> <b>You must not:</b>

     <ul>
        <li>Republish material from Zurit Consulting</li>
        <li>Sell, rent or sub-license material from Zurit Consulting</li>
        <li>Reproduce, duplicate or copy material from Zurit Consulting</li>
        <li>Redistribute content from Zurit Consulting</li>
     </ul>
     No use of Zurit Consulting's logo or other artwork will be allowed for linking without a trademark license agreement.
     </p>

     <h2>What Information Does Zurit Consulting Collect and Process?</h2>
        <p>
            When using Our Website, You may be asked to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:
                <ul>
                    <li><b>Account information</b> when you sign up for an account, which includes your email address, password, name, and email preferences. If you sign up through a third-party service, like Google or Apple, we’ll collect the information from them that you authorize.</li>
                    <li><b>Profile information</b> when you sign up for an account through Zurit Consulting's platform we will collect the information listed on the registration form which includes , your email address, phone number and Full name upon your authorization</li>
                    <li><b>Data from logs and device information</b> this includes internet protocol (IP) address, browser type and version, time zone setting and location, browser plug-in types and versions, and operating system and platform.</li>
                    <li><b>Cookie information and other identifiers</b> to enable our systems to recognize your browser or device and provide, protect, and improve our products. For more information, see our Cookie Policy above. Note that our products currently do not respond to Do Not Track requests. </li>
                    <li><b>Usage information</b> about how you interact with our products, including the pages you visit, the time and date of your visit, and the time spent on those pages.</li>
                    <li><b>Other information you directly share with us</b> You may have the option to submit additional information as you use our products. For example, you may choose to participate in surveys where you can provide feedback on our products,services offered and events or trainings attended.</li>
                </ul>

        </p>

        <h2>What Does Zurit Consulting Do With Your Information?</h2>
        <p>
            We use the information we collect to provide, maintain, and improve our products and services, to develop new ones, and to protect Zurit Consulting and our users.
            In addition to this we use the information to send you updates, newsletters, marketing materials and other information that may be of interest to you. 
            You can opt out of receiving these communications at any time by clicking the unsubscribe link in the email or by contacting us.
        </p>

        <h2>Iframes</h2>
        <p>
        Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.
        </p>

            </div>
        

</div>

{{-- PWA --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    {{-- END OF PWA --}}

</body>

</html>
