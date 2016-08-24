@if(Session::has('flash_message'))
    <div class="alert bg-info" role="alert">
        <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
        <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
        {{ Session::get('flash_message') }}
    </div>
@endif
