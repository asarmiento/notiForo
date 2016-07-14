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
        <img src="/storage/images/{!!  $notice->name_image !!}" width="300" height="200">
        <p >
            {!! $notice->content !!}

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