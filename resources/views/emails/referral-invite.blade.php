<!DOCTYPE html>
<html>
<head>
    <title>You've Been Invited!</title>
</head>
<body>
    <h1>Hello!</h1>
    <p>{{ $inviter }} has invited you to join our platform. Use the link below to sign up:</p>
    <a href="{{ $referralLink }}">{{ $referralLink }}</a>
    <p>We look forward to having you!</p>
</body>
</html>
