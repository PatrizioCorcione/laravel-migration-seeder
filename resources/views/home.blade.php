@extends('layout.main')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Stazione di arrivo</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Orario di partenza</th>
                    <th scope="col">Orario di arrivo</th>
                    <th scope="col">Codice treno</th>
                    <th scope="col">Stato treno</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->company }}</td>
                        <td>{{ $item->arrival_station }}</td>
                        <td>{{ $item->departure_station }}</td>
                        <td>{{ $item->time_departure }}</td>
                        <td>{{ $item->time_arrival }}</td>
                        <td>{{ $item->train_code }}</td>
                        <td>{{ $item->removed }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        {{ $trains->links() }}
    </div>
@endsection
