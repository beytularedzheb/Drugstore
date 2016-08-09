@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

