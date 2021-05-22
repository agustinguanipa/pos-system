<div class="form-group">
    <label for="">Permisos Especiales</label>
        <ul class="list-unstyled">
            <li>
                <label>{!! Form::radio('special', 'all-access') !!} Acceso Total</label>
                <label>{!! Form::radio('special', 'no-access') !!} Ningún Acceso</label>
            </li>
        </ul>
</div>
<div class="form-group">
    <label for="">Permisos</label>
        <ul class="list-unstyled">
            @foreach ($permissions as $permission)
                <li>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                        {{$permission->name}}
                        <em>({{$permission->description}})</em>
                    </label>
                </li>
            @endforeach
        </ul>
</div>