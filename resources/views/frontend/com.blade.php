@foreach($comment as $c)
<ul>
    <li>{{$c->id}}</li>
    <li>{{$c->comment}}</li>
    {{$c->post->title}}
    <li></li>
</ul>
@endforeach