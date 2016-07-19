<div data-id="{{ $ticket->id }}" class="well well-sm ticket">
    <h4 class="list-title">
        {{ $ticket->title }}
        <a class="btn btn-default" href="{{route('tickets.noticia',$ticket->id)}}">Leer Mas..</a>
    </h4>
    <p>

            @if (Auth::guest())
                <a href="#">
                    <span class="votes-count">{{ $ticket->num_votes }} votos</span>
                    -<span class="comments-count">{{ $ticket->num_comments }} comentarios</span>.
                </a>
        @else
                <a href="{{ route('tickets.details', $ticket) }}">
                    <span class="votes-count">{{ $ticket->num_votes }} votos</span>
                    -<span class="comments-count">{{ $ticket->num_comments }} comentarios</span>.
                </a>
            @endif
    </p>
    <p class="date-t">
        <span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/y h:ia') }}
        Por {{ $ticket->author->name }}
    </p>
</div>