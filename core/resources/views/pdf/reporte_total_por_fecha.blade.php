<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
    <title>reporte total por fecha</title>
</head>
<body>
    <div class="header">
        <h1 class="header_logo" style="color:white;"> EsteHotel</h1>
</div>
<style type="text/css">
.header {
    position: fixed;
    width: 100%;
    height: 50px;
    font-weight: bold;
    text-align: center;
    background: black;
   
}

tr th{
    background-color: cadetblue;
    color: white;
}
.resumen{
    margin-top: 120px;
}
</style>


<div class="row resumen">
    
                <h3 class="panel-title resumen"><strong>RESUMEN</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                              <th></th>
                              <th></th>
                                <th class="text-center"><strong>Valores</strong></th>
                                <th class="text-right"><strong>Totales</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                          
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>  
                                <td class="thick-line text-center"><strong>Pagos huéspedes</strong></td>
                                <td class="thick-line text-right">{{$sumatotalhuespedes}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Pagos reservas</strong></td>
                                <td class="no-line text-right">{{$sumatotalreservas}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">{{$sumatotalhuespedes+$sumatotalreservas}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
      
</div>
    <div class="resumen">
        <h3>Información de las habitaciones</h3>
        <table class="table">
            <thead>

                <tr>
                    
                    <th scope="col">Numero de la habitaci&oacute;n</th>
                    <th scope="col">Fecha </th>
                    <th scope="col">Total</th>               
                </tr>   
            </thead>
            <tbody>

                @foreach ($sub_datos_huespedes as $pagos)
                    <tr>               
                    
                        <td>{{$pagos->numero_habitacion}}</td>  
                        <td>{{$pagos->created_at}}</td> 
                        <td>{{$pagos->total}}</td>
                    
                     </tr>
        
                @endforeach
            </tbody>
        
    
    
        </table>
    </div>
    
    <div>

    </div>
  
    <div class="resumen">
        <h3>Informacion de las reservas</h3>
        <table class="table">
            <thead> 
                        <tr>
                            <th scope="col">Total</th> 
                            <th scope="col">Fecha</th>                
                        </tr>   
            </thead>
            <tbody>

                @foreach ($sub_datos_reserva as $reserva)
                    <tr>
                    <td>{{$reserva->pago}}</td>
                    <td>{{$reserva->created_at}}</td>          
                    </tr>
                @endforeach
            </tbody>
        


        </table>
    </div>
<div>


</div>
<div>


</div>



    
</body>
</html>