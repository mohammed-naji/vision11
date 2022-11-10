<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style>
        .message {
            color: yellow;
        }
    </style> --}}
</head>
<body style="background: #eee;font-family:Arial, Helvetica, sans-serif">

    <div style="width: 600px;background:#fff;padding:20px;border:2px solid #cfcfcf;margin: 50px auto">
        <h4>Dear Admin,</h4>
        <p>Hope this mail finds you well</p>
        <br>
        <p>There is an new contact us entry as bellow:</p>
        <p><b>Name</b>: {{ $data['name'] }}</p>
        <p><b>Email</b>: {{ $data['email'] }}</p>
        <p><b>Phone</b>: {{ $data['phone'] }}</p>
        <p><b>Subject</b>: {{ $data['subject'] }}</p>
        <p><b>Message</b>: {{ $data['message'] }}</p>
        <br>
        <br>
        <h5>Best Regards</h5>
    </div>

</body>
</html>
