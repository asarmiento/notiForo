@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title-show">
                    {{ $ticket->title }}
                    @include('tickets/partials/status', compact('ticket'))
                </h2>
                @if($ticket->notice)
                    <p>
                       <img src="<?php echo "/storage/images/".$ticket->name_image ?>" height="242" width="242"> 
					   {{$ticket->notice}}
                    </p>
                @endif



                <p class="date-t">
                    <span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/y h:ia') }}
                    - {{ $ticket->author->name }}
                </p>





                <h3>Nueva Comentario</h3>

                @include('partials/errors')

                <form action="{{ route('comments.submit', $ticket->id) }}" method="POST" accept-charset="UTF-8">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="comment">Nuevo suceso:</label>
                        <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                </form>


                <h3>Nuevos sucesos ({{ count($ticket->comments) }})</h3>

                @foreach ($ticket->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p>{{ $comment->comment }}</p>
                        @if ($comment->link)
                            <p>
                                <a href="{{ $comment->link }}" rel="nofollow" target="_blank">
                                    {{ $comment->link }}
                                </a>
                            </p>
                            @can('selectResource', $ticket)
                                {!! Form::open(['route' => ['tickets.select', $ticket, $comment]]) !!}
                                <p>
                                    <button type="submit" class="btn btn-primary">Seleccionar tutorial</button>
                                </p>
                                {!! Form::close() !!}
                            @endcan
                        @endif

						
                        <p class="date-t">
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at->format('d/m/Y h:ia') }}
                        </p>
						
						
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection