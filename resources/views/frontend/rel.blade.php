@foreach($post as $p)
<ul>
    <li>{{$p->id}}</li>
    <li>{{$p->title}}</li>
    <li>{!!$p->description!!}</li>
    @foreach($p->comments as $comment)
    {{$comment->comment}}
    @endforeach
    <li></li>
    <form action="{{url('rel/'. $p->id)}}" class="d-inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger mr-1">del</button>
                    </form>
</ul>
@endforeach