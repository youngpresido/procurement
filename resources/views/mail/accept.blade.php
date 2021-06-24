<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <pre>
    Dear {{ $vendor->name }},
   Congratulations, you have been accepted to be one of ur vendors.
    Login details on our platform is
    email: {{ $vendor->email }}
    password : Password
    </pre>
</body>
</html>
