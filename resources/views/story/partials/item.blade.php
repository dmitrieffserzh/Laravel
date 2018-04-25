<?php

?>
@forelse ($stories as $story)

    <h2>{{$story->title}}</h2>
    <div>{!! $story->content !!}</div>
    <div class="col-md-6">{{$story->rating}}</div>
    <div class="col-md-6 text-right">{{$story->created_at->diffForHumans()}}</div>

    <hr>
@empty
    <p>Нет записей!</p>
@endforelse