Hola <i>{{ $data->receiver }}</i>,
<p>Su proceso de registro en EsteHotel se ha logrado correctamente. Pero aun necesita activar su cuenta.</p>

<p>Para activar su cuenta por favor de click en el siguiente enlace</p>
<a  href="{{$data->link}}">  Activar </a>
 
<p><u>Recuerde que sus datos son:</u></p>
 
<div>
<p><b>Usuario:</b>&nbsp;{{ $data->user }}</p>
<p><b>Contraseña</b>&nbsp;{{ $data->password }}</p>
</div>
 
<p><u>Para ingresar a la plataforma debe utilizar el correo electrico que registró.</u></p>
 
{{--  <div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>  --}}
 
Un cordial saludo,
<br/>
<i>{{ $data->sender }}</i>