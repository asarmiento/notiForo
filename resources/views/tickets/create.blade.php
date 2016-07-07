@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Nueva Información</h2>
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