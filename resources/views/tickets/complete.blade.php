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
@endsection