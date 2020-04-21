<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top">
        <!-- <img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/> -->
        <h1> Hotel : {{$sub_datos[0]->nombre}}</h1>
        </td>
        <td align="right">           
            <pre>
                Direccion:{{$sub_datos[0]->direccion}}
                Telefono:{{$sub_datos[0]->telefono}}
                Fecha de orden:{{$fechahoy}}
                Fecha Entraga : {{$sub_datos[0]->fechaIngreso}}
                Fecha Salida : {{$sub_datos[0]->fechaSalida}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>Para:</strong>{{$sub_datos[0]->nombres."  ".$sub_datos[0]->apellidos}}</td>
        <td><strong>Expedida:</strong> {{$nombreusuario}}</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>        
        <th>valor</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
        <th scope="row">1</th>
        <td align="right">habitaci&oacute;n</td>
        <td align="right">{{$sub_datos[0]->pago}}</td>
        <td align="right">{{$sub_datos[0]->pago}}</td>
       
      </tr>
 
    </tbody>

    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="right">Subtotal $</td>
            <td align="right">{{$sub_datos[0]->pago - ($sub_datos[0]->pago * 0.19)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td align="right">IVA 19% $</td>
            <td align="right">{{  $sub_datos[0]->pago * 0.19 }}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td align="right">Total $</td>
            {{-- <td align="right" class="gray">{{$sub_datos[0]->pago}}</td> --}}
            <td align="right" class="gray">{{  $sub_datos[0]->pago  }}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>