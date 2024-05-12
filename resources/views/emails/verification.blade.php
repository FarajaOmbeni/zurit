<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
        
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Please click the link below to verify your email address:</p>
    <div class="read_bt">
    <a href="{{ url('/email/verify/' . $user->id . '/' . $user->verification_token) }}">Verify Email Address</a>
    </div>
</body>
</html>