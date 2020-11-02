@if (isset($errors) && $errors->any())
    <p class="alert alert-danger">
    @foreach ($errors->all() as $message)
        {{ $message }} <br />
    @endforeach
    </p>
@endif

@if (session()->has('error'))
    <p class="alert alert-danger">{{ __(session()->get('error')) }}</p>
@endif

@if (session()->has('warning'))
    <p class="alert alert-warning">{{ __(session()->get('warning')) }}</p>
@endif

@if (session()->has('info'))
    <p class="alert alert-info">{{ __(session()->get('info')) }}</p>
@endif

@if (session()->has('success'))
    <p class="alert alert-success">{{ __(session()->get('success')) }}</p>
@endif
