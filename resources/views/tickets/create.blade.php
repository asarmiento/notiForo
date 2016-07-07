@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                 <h2>Nueva Noticia</h2>

                @include('partials/errors')
                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST','accept-charset'=>"UTF-8",
                'enctype'=>"multipart/form-data"]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Título') !!}
                        {!!
                            Form::textarea('title', null, [
                                'rows'  => 2,
                                'class' => 'form-control',
                                'placeholder' => 'El titulo de la información'
                            ])
                        !!}

                        {!! Form::label('content', 'Contenido') !!}
                        {!! Form::textarea('content', null, [
                                'rows'  => 15,
                                'class' => 'form-control',
                                'placeholder' => 'Comparte un tutorial o recurso colocando una URL (opcional)'
                            ])
                        !!}
                        {!! Form::label('file', 'Imagen Noticia') !!}
                        {!! Form::file('file', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Comparte un tutorial o recurso colocando una URL (opcional)'
                            ])
                        !!}



                    </div>
					
                    <p>				
                       <button type="submit" class="btn-primary">
                            Enviar 
                        </button>
                    </p>
				
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection