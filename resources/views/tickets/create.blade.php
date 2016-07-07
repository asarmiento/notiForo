@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
<<<<<<< HEAD
                <h2>Nueva Información</h2>
=======
                <h2>Nueva Noticia</h2>
>>>>>>> ba63f50d4b95bb44939eadbd225b0db77041791b
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
<<<<<<< HEAD
                        {!! Form::label('contentNotice', 'Contenido') !!}
                        {!! Form::textarea('contentNotice', null, [
						'size' => '90x8', 'class' => 'form-control', 
						'placeholder' => 'Describción de la información detalla'])					
                        !!}
						<p>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Adjuntar imagen</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="file" >
                            </div>
                        </div>
=======
                        {!! Form::label('content', 'Contenido') !!}
                        {!! Form::textarea('content', null, [
                                'rows'  => 15,
                                'class' => 'form-control',
                                'placeholder' => 'Comparte un tutorial o recurso colocando una URL (opcional)'
                            ])
                        !!}
                        {!! Form::label('title', 'Imagen Noticia') !!}
                        {!! Form::file('file', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Comparte un tutorial o recurso colocando una URL (opcional)'
                            ])
                        !!}


>>>>>>> ba63f50d4b95bb44939eadbd225b0db77041791b
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