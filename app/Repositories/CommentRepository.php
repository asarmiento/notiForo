<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\User;

class CommentRepository extends BaseRepository {

    public function getModel()
    {
        return new TicketComment();
    }

    public function create(Ticket $ticket, User $user, $comment, $link = '', $name)
    {
        $comment = new TicketComment(compact('comment', 'link','name_image'));
        $comment->user_id = $user->id;
        $comment->name_image = $name;
        $ticket->comments()->save($comment);
    }

}