<!DOCTYPE html>
<html>
<head>
    <title>Activate Your Account</title>
    <!-- Inline styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f7f7f7;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 20px;
        }
        p {
            margin-top: 0;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<p>Dear ,</p>

<p>Welcome to SmartHR We are excited to have you onboard and thank you for choosing our services.</p>

<p>To get started, you need to activate your account by clicking on the activation link below. This will confirm your email address and allow you to access your account.</p>

<!-- <p>Activation Link: <a href="https://hr-saas.alefsoftware.com/verify-email/{{$token}}">Activate Account</a></p> -->
<p>Activation Link: <a href="https://hr-saas.alefsoftware.com/en/verify-email/{{$token}}">Activate Account</a></p>
<!-- <p>Activation Link: <a href="https://www.google.com/">Activate Account</a></p> -->

<p>If you have any questions or concerns, please feel free to contact our support team at [Insert contact information]. We are always here to help you.</p>

<p>Thank you for choosing SmartHR. We look forward to serving you!</p>

<p>Best regards,</p>
<p>SmartHR</p>

</body>
</html>
{{--{{ $user->activation_token }}--}}
