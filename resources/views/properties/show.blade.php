@extends('layouts.item')

@section('item-details')
    @if($landRegistry)
    <tr>
        <th scope="row">Tipo de prédio</th>
        <td>{{ $landRegistry }}</td>
    </tr>
    @endif

    @if($typology)
    <tr>
        <th scope="row">Tipologia</th>
        <td>{{ $typology }}</td>
    </tr>
    @endif

    @if(!$landRegistry && !$typology)
    <tr>
        <td>Detalhes indisponíveis.</td>
    </tr>
    @endif
@stop
