<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <form action="{{ route('form.export') }}" method="post">
        @csrf
        <label for="">Desde:</label>
        <input name="desde" type="date">
        <label for="">Hasta:</label>
        <input name="hasta" type="date">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>