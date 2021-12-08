@if (Session::has('result'))
    @php
        $resultMessage = Session::get('result');
    @endphp
    <div class="alert alert-{{ $resultMessage['status'] ? 'success' : 'danger' }}">
        {{ $resultMessage['message'] }}
    </div>
@endif

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
