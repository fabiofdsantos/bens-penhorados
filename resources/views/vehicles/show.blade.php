@extends('layouts.item')

@section('item-details')
    @if($make)
    <tr>
        <th scope="row">Marca</th>
        <td>{{ $make }}</td>
    </tr>
    @endif

    @if($model)
    <tr>
        <th scope="row">Modelo</th>
        <td>{{ $model }}</td>
    </tr>
    @endif

    @if($year)
    <tr>
        <th scope="row">Ano</th>
        <td>{{ $year }}</td>
    </tr>
    @endif

    @if($engDispl)
    <tr>
        <th scope="row">Cilindrada</th>
        <td>{{ number_format($engDispl) }} cc</td>
    </tr>
    @endif

    @if($fuel)
    <tr>
        <th scope="row">Combustível</th>
        <td>{{ $fuel }}</td>
    </tr>
    @endif

    @if($color)
    <tr>
        <th scope="row">Cor</</th>
        <td>{{ $color }}</td>
    </tr>
    @endif

    @if($category)
    <tr>
        <th scope="row">Categoria</</th>
        <td>{{ $category }}</td>
    </tr>
    @endif

    @if($type)
    <tr>
        <th scope="row">Tipo</</th>
        <td>{{ $type }}</td>
    </tr>
    @endif

    @if($regPlateCode)
    <tr>
        <th scope="row">Matrícula</</th>
        <td>{{ $regPlateCode }}</td>
    </tr>
    @endif

    @if($goodCondition != null)
    <tr>
        <th scope="row">Estado</</th>
        <td>{{ ($goodCondition === true ? 'Bom/Razoável' : 'Mau') }}</td>
    </tr>
    @endif
@stop
