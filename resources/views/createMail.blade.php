<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('sendM')}}" method="POST">
    @csrf
        <input type="text" placeholder="Name" name="client_name">
        <input type="email" placeholder="email" name="email">
        <input type="text" placeholder="subject" name="subject">
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>