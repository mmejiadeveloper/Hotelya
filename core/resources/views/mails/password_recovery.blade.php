Hola <i>{{ $data->receiver }}</i>,
<p>Usted ha recibido este correo porque nos ha indicado que olvidó su contraseña.</p>

<p>Para restaurar su contraseña por favor de click en el siguiente enlace</p>
<a  href="{{$data->link}}">  Restaurar </a>
 
<p><u>Este link se inhabilitará en un tiempo limite.</u></p>
 
Un cordial saludo,
<br/>
<i>{{ $data->sender }}</i>