<!--
 * Created by PhpStorm.
 * User: anwar
 * Date: 06/07/16
 * Time: 11:28 PM
-->
@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>{!! $notice->title !!}</h1>
                <div class="text-center text-justify img-responsive ">
                    <img class="Left" src="/storage/images/{!!  $notice->name_image !!}" width="300" height="200">
                    <p class="right" >{!! $notice->content !!}</p>
                </div>
                @if(Auth::user())
                    <h3>Nueva Comentario</h3>

                    @include('partials/errors')

                    <form action="{{ route('comments.submit', $ticket->id) }}" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="comment">Nuevo suceso:</label>
                            <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="comment">Imagen:</label>
                            <input class="form-control" name="file" type="file" id="file">

                        </div>

                        <button type="submit" class="btn btn-primary">Enviar comentario</button>
                    </form>
                @endif
                <h3>Nuevos Comentarios ({{ count($notice->comments) }})</h3>
                @foreach ($notice->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p>{{ $comment->comment }}</p>
                        @if ($comment->link)
                            <p>
                                <a href="{{ $comment->link }}" rel="nofollow" target="_blank">
                                    {{ $comment->link }}
                                </a>
                            </p>

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
</div>

@endsection