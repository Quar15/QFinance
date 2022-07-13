@extends('layout')

@section('styles')

    <link rel="stylesheet" href="./css/style-dashboard.css">
    <link rel="stylesheet" href="./css/style-popup.css">
    <script src="./js/jquery.min.js"></script>

@endsection

@section('content')

        <main class="wrapper">
        <div class="summary">
            <div class="plus">
                <h2>{{ number_format($plus, 2, '.', ' ') }}</h2>
                <p>Income</p>
            </div>
            <div class="balance">
                <h2>{{ number_format($plus + $minus, 2, '.', ' ') }}</h2>
                <p>Balance</p>
            </div>
            <div class="minus">
                <h2>{{ number_format($minus, 2, '.', ' ') }}</h2>
                <p>Expenses</p>
            </div>
        </div>

        <table>
            <tr class="header">
                <th>Name</th>
                <th>Category</th>
                <th>Date Added</th>
                <th>Value</th>
            </tr>

            <tr id="floating-header" class="header">
                <th>Name</th>
                <th>Category</th>
                <th>Date Added</th>
                <th>Value</th>
            </tr>

            @if( $items->count() > 0 )
                @foreach($items as $item)
                    <tr onclick="UpdateForm({{ $item->id }}, '/item/update', 'Edit', '{{ $item->title }}', {{ number_format($item->value, 2, '.', ' ') }}, {{ $item->category->id }})">
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ number_format($item->value, 2, '.', ' ') }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <button id="add-new-item" onclick="UpdateForm(-1, '/item/add', 'Add' , '', '')"><i class='bx bx-plus-medical'></i></button>
    </main>

    <x-item-popup :categories="$categories" />

@endsection

@section('end')
    <script src="./js/table-header.js"></script>
    <script src="./js/item-popup.js"></script>
@endsection