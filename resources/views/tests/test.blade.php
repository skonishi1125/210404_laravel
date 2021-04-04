testです

@foreach ($values as $value)
    {{$value->id}}
    {{$value->text}}
    {{$value->created_at}}
    {{$value->updated_at}}
@endforeach