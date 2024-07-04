<!DOCTYPE html>
<html>
<head>
    <title>Send OTP</title>
</head>
<body>
    <h2>Send OTP</h2>
    <form method="post" action="{{ route('send-otp') }}">
        @csrf
        <label for="mobile">Mobile Number:</label><br>
        <input type="text" id="mobile" name="mobile"><br>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
