<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($parking as $item)
    <li>
        <h3>{{$item -> nombreDeBornesDisponibles}}</h3>
        <p> {{
            $splitgeo = explode(',', $item->geo);
            }} </p> 
        <p>{{$item -> geo}}</p>
        <hr>
    </li>
        
    @endforeach
    
</body>
</html>