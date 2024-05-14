@extends('layout.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->company }}</td>
                    <td>{{ $item->arrival_station }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        {{ $trains->links() }}
    </div>
@endsection
