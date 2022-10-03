
@if ($errors->any())
    <div class="alert alert-danger mx-3 my-3">
        <ul class="p-0 m-0 list-none px-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif