
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <p>Por favor corrige tus errores:</p>
        <ul>
            @foreach($errors->all() as $error)

                <li> {{ $error }} </li>

            @endforeach
        </ul>
        @endif
    </div>