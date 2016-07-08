<!--
 * Created by PhpStorm.
 * User: anwar
 * Date: 06/07/16
 * Time: 11:28 PM
-->
@extends('layout')

@section('content')
    <div class="col-md-7 col-lg-7">
        <h1>{!! $notice[0]->title !!}</h1>
        <p>
            <img src="/storage/images/{!!  $notice[0]->name_image !!}" width="300" height="200">
            {!! $notice[0]->content !!}
            {!! public_path() !!}/public/storage/images/{!!  $notice[0]->name_image !!}
        </p>
    </div>
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
@endsection