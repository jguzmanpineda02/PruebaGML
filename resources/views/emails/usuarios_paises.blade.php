<!DOCTYPE html>
<html>
<head>
    <title>PT - GML</title>
</head>
<body>
    <h1>Numero de usuarios por paises</h1>
    @foreach($usuariosPorPais as $u)
    <p>{{$u->pais . ' - ' . $u->usuarios}}</p>
    @endforeach
    <p>Powered by: GML</p>    
</body>
</html>