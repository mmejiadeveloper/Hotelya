@extends('layouts.layout')

@section('content')
    <h1>hola</h1>
@stop

@section('js')
    <script type="text/javascript" >
        var user_type = {{ $user_type }};
        if(user_type==0){
            swal({
                type: 'warning',
                title: 'Información',
                text: 'Usted ha entrado al sistema de forma anónima. Recuerde que puede obtener algunos privilegios si se registra en la plataforma. ',
            })
        }
    </script>
@endsection