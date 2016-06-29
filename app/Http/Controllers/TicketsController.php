<?php namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use TeachMe\Repositories\TicketRepository;

class TicketsController extends Controller {

    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

	public function latest()
    {
        $tickets = $this->ticketRepository->paginateLatest();

        return view('tickets/list', compact('tickets'));
    }

    public function popular()
    {
        $tickets = $this->ticketRepository->paginatePopular();

        return view('tickets/list', compact('tickets'));
    }

    public function open()
    {
        $tickets = $this->ticketRepository->paginateOpen();
        return view('tickets/list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->ticketRepository->paginateClosed();
        return view('tickets/list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);
        return view('tickets/details', compact('ticket'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|max:120|unique:tikects',
            'link'  => 'url',
        ]);
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = currentUser()->id.'-'.$request->get('title').$file->getClientOriginalExtension();


        $ticket = $this->ticketRepository->openNew(
            currentUser(),
            $request->get('title'),
            $request->get('link'),
            $nombre

        );
        

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        return Redirect::route('tickets.details', $ticket->id);
    }

    public function select($ticketId, $commentId)
    {
        $ticket = $this->ticketRepository->findOrFail($ticketId);

        $this->authorize('selectResource', $ticket);

        $ticket->assignResource($commentId);

        return Redirect::back();
    }

}
