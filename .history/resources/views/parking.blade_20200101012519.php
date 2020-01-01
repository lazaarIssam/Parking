<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @foreach ($parking as $item)
    <li>
        <h3>{{$item -> nombreDeBornesDisponibles}}</h3> 
        <p>latitude : {{explode(',', trim($item -> geo))[0]}}</p>
        <p>lontitude : {{-explode(',', trim($item -> geo))[1]}}</p>
        <hr>
    </li>
    @endforeach --}}
    <div style="width: 90%; height: 500px; margin: 35px">
        {!! Mapper::render() !!}
    </div>
    <div>
        <form action="" method="post">
            <input type="text" name="latitude" id="latitude" placeholder="Latitude">
        </form>
    </div>
</body>
</html>