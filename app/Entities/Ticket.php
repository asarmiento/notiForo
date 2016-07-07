<?php

namespace TeachMe\Entities;

class Ticket extends Entity
{

<<<<<<< HEAD
    protected $fillable = ['title', 'notice', 'status','name_image'];
=======
    protected $fillable = ['title', 'content', 'status','name_image'];
>>>>>>> ba63f50d4b95bb44939eadbd225b0db77041791b

    public function author()
    {
        return $this->belongsTo(User::getClass(), 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::getClass());
    }

    public function voters()
    {
        return $this->belongsToMany(User::getClass(), 'ticket_votes')->withTimestamps();
    }

    public function getOpenAttribute()
    {
        return $this->status == 'open';
    }

    public function assignResource($comment)
    {
        if (is_numeric($comment)) {
            $comment = TicketComment::findOrFail($comment);
        }

        if ($comment->link == '' || $this->id != $comment->ticket_id) {
            abort(404);
        }

        $this->link = $comment->link;
        $this->status = 'closed';
        $this->save();

        $this->comments()->where('selected', true)->update(['selected' => false]);

        $comment->selected = true;
        $comment->save();
    }

}
