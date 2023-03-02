<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resoureces/js/app.js'])
    <title>Ticket {{$id}}</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>

<body>
    <img src="{{public_path('img\imagen1.png')}}" alt="logo" style="position:absolute; top:0; margin-left:20px">
    <br><br><br><br>
    <div style="margin:3rem 3rem;">
        <h2>ORDEN DE SERVICIO # {{$id}} <br> <small>{{$tema}}</small></h2>
        <br>
        <hr>

        <table>
            <tr>
                <td>
                    <strong>Edificio:</strong> {{$edificio}} <br>
                    <strong>Departamento:</strong> {{$departamento}} <br>
                    <strong>Teléfono o EXT:</strong> {{$telefono}} <br>
                    <strong>IP:</strong> {{$ip}} <br>
                    <strong>Usuario PC:</strong> {{$usuario_red}} <br>
                    <strong>Persona que abrió el ticket:</strong> {{$creador}} <br>
                    <strong>Status:</strong> {{$status}} <br>
                    <strong>Categoria:</strong> {{$categoria}}
                </td>
                <td></td>
            </tr>
        </table>
        <hr>
        
        <br>

        <h4>DESCRIPCION</h4>
        <div style="height: 450px; max-height: 450px; overflow:hidden">
        {{$descripcion}}    
        
        <br><br>

        <h4>COMENTARIOS</h4>
            {{$comentarios_print}}            
        </div>
        <br><br><br><br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 45%; text-align:center;">
                    <div style="width: 200px; border: 1px solid black; margin-left:55px;"></div>
                    Atendió
                    <span>{{$asignado}}</span>
                </td>
                <td style="width: 55%; text-align:center;">
                <div style="width: 200px; border: 1px solid black; margin-left:90px;"></div>
                    Conformidad
                </td>
            </tr>
        </table>
    </div>

    <footer>
        <div style="position:absolute; bottom:0; margin-bottom:50px; width:100%">
            <p style="text-align:center; font-size:13px;">
                “2023, Centenario de la Muerte del General Francisco Villa” <br>
                “2023, 100 años del Rotarismo en Chihuahua” <br>
                Calle Pedro N. García 2231, Col. Partido Romero, C.P. 32030. Ciudad Juárez, Chih. <br>
                Teléfonos: (656) 686 0073 y (656) 686 0001
                www.jmasjuarez.gob.mx
            </p>
        </div>
        <img src="{{public_path('img\imagen3.png')}}" alt="escudo" style="position:absolute; bottom:0; margin-bottom:30px; margin-left:10px">
        <img src="{{public_path('img\footer.png')}}" alt="pie de pagina" style="position:absolute; bottom:0;">
    </footer>
</body>

</html>