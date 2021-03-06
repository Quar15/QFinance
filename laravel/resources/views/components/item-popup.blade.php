@props(['categories'])

<div class="item-panel-popup" id="item-panel-popup">
    <div id="close-popup"><i class='bx bx-x' ></i></div>
    <h2>Edit</h2>
    <form action="/dashboard" method="POST">
        @csrf
        <input type="hidden" name="id" id="id" value="1">
        <div>
            <input  placeholder="Name"
                    type="text"
                    name="title"
                    id="name"
                    value="{{ old('title') }}"
                    required
            >
        </div>
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="value-box">
            <div class="symbol-box">
                <div onclick="ChangeSymbol('-')" class="active" id="symbol-minus"><i class='bx bx-minus' ></i></div>
                    <div onclick="ChangeSymbol('+')" id="symbol-plus"><i class='bx bx-plus'></i></div>
            </div>
            <div>
                <input  placeholder="Value"
                        type="number"
                        step="0.01"
                        name="value"
                        id="value"
                        value="{{ old('value') }}"
                        required
                >
            </div>
        </div>
        @error('number')
                <p class="error">{{ $message }}</p>
        @enderror

        <select name="category_id" id="category">
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <div>
            <button type="submit" class="">
                Save
            </button>
        </div>
    </form>
</div>