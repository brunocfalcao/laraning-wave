@extends('library::Elements.Layouts.Cards.Standard')

@php
    // Obtain information about the route in order to compute the <form> tag.
    $route = Route::current();
    $routeCollection = collect(explode('.', Route::current()->getName()));
@endphp

@section('card.title')
    @yield('datagrid.title', 'Manage ' . ucfirst($routeCollection[$routeCollection->count()-2]))
@endsection

@section('card.body')
        <div class="mb-1rem">
            <a href="{{ route(data_get($routes, 'create.name')) }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp; {{ $button or 'Create new' }}</a>
        </div>

        @if($data->count() > 0)
            <table class="table table-responsive-lg table-striped" id="{{ str_random(10) }}">
                <thead>
                    <tr>
                        @foreach($headers as $header)
                            <th>{{ $header }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Table lines & cells --}}
                    @foreach($data as $line)
                        <tr>
                            @foreach($columns as $column)
                                @switch($formatters[$loop->index])
                                    @case('image')
                                        <td class="align-middle"><img src="{{ image($line->{$column}, 'wave') }}" alt="No Image" style="max-width: 200px"></a></td>
                                        @break;

                                    @case('text')
                                        <td class="align-middle">{!! wysiwyg_text($line->{$column}) !!}</td>
                                        @break;

                                    @case('pk')
                                        @break;

                                    @default
                                    <td class="align-middle">{{ $line->{$column} }}</td>
                                @endswitch
                            @endforeach
                            {{-- Action buttons --}}
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Edit">
                                <a href="{{ route( data_get($routes, 'edit.name'), [data_get($routes, 'edit.model_name') => $line['id']]) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @else
            <p>No records found.</p>
        @endif
@endsection

@section('card.footer')
    @yield('datagrid.footer')
@endsection
