<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>You have received a new message from the contact form:</p>
<ul>
    <li><strong>Name:</strong> {{ $name }}</li>
    <li><strong>Email:</strong> {{ $email }}</li>
    <li><strong>Phone:</strong> {{ $phone }}</li>
    <li><strong>Message:</strong> {{ $message }}</li>
</ul>
</body>
</html>
