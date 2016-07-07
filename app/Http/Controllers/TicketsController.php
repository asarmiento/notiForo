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
    /**************************************************
    * @Author: Anwar Sarmiento Ramos
    * @Email: asarmiento@sistemasamigables.com
    * @Create: 06/07/16 11:22 PM   @Update 0000-00-00
    ***************************************************
    * @Description: Mostraremos la noticia completa en
    * esta vista.
    *
    *
    * @Pasos:
    *
    *
    * @return view
    ***************************************************/
    public function noticia($id){

        $notice = $this->ticketRepository->getModel()->where('id',$id)->get();
        return view('tickets.complete',compact('notice'));
    }
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|max:120',
            'content'  => 'required',
        ]);
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $name = currentUser()->id.'-notice.'.$file->getClientOriginalExtension();
        $ticket = $this->ticketRepository->openNew(
            currentUser(),
            $request->get('title'),
            $request->get('content'),
            $name

        );

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($name,  \File::get($file));

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
