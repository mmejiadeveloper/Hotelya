
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
    <title>reporte pagos reservas</title>
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
tr td{
        border: 1px solid black;
}
p{
    text-align: right;
    font-size: 20px;
}
</style>

<br>
<br>
<br>
<table class="table">
       <tr>
              
               
                <th scope="col">Total</th> 
                <th scope="col">Fecha</th>                
            </tr>   
      
   
        @foreach ($data as $reserva)
         <tr>
             
            <td>{{$reserva->pago}}</td>
            <td>{{$reserva->created_at}}</td>            
           
            
        </tr>

        @endforeach
   
</table>
<div>

    <p>el valor total de pagos reservas es :{{$total}}</p>
</div>
    
    
</body>
</html>

