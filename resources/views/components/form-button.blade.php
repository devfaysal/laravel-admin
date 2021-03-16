@props(['action', 'method', 'class' => '', 'alert' => 'Are you sure?'])
<form method="POST" action="{{ $action }}">
    @csrf
    @method($method ?? 'POST')
    <button onclick="return confirm('{{ $alert }}');" type="submit" class="{{ $class }}">
        {{ $slot }}
    </button>
</form>