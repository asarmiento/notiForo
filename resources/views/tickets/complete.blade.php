<!--
 * Created by PhpStorm.
 * User: anwar
 * Date: 06/07/16
 * Time: 11:28 PM
-->
@extends('layout')

@section('content')
    <div class="col-md-7 col-lg-7 row text-center">
        <h1>{!! $notice[0]->title !!}</h1>
        <img src="/storage/images/{!!  $notice[0]->name_image !!}" width="300" height="200">
        <p >
            {!! $notice[0]->content !!}

        </p>

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
                    @can('selectResource', $notice)
                        {!! Form::open(['route' => ['tickets.select', $notice, $comment]]) !!}
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

@endsection