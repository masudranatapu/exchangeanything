<input {{ $checked ? 'checked':'' }}
    type="checkbox"
    name="{{ $name }}"
    data-bootstrap-switch
    value="{{ $value }}">

<x-forms.error name="{{ $name }}"/>
