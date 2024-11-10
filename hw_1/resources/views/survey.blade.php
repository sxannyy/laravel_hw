@extends('main_layout')

@section('content')
    <h2>Анкета</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/survey" method="POST">
        @csrf

        <div class="quest">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <label for="age">Возраст:</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" min="1" max="120">
            @error('age')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <label for="gender">Пол:</label>
            <select id="gender" name="gender">
                <option value="">Выберите</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Мужской</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Женский</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Другой</option>
            </select>
            @error('gender')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <label>Как вы оцениваете удобство сайта?</label>
            <div>
                <input type="radio" id="rating_1" name="rating" value="1" {{ old('rating') == '1' ? 'checked' : '' }}>
                <label for="rating_1">1 - Очень плохо</label>
            </div>
            <div>
                <input type="radio" id="rating_2" name="rating" value="2" {{ old('rating') == '2' ? 'checked' : '' }}>
                <label for="rating_2">2 - Плохо</label>
            </div>
            <div>
                <input type="radio" id="rating_3" name="rating" value="3" {{ old('rating') == '3' ? 'checked' : '' }}>
                <label for="rating_3">3 - Удовлетворительно</label>
            </div>
            <div>
                <input type="radio" id="rating_4" name="rating" value="4" {{ old('rating') == '4' ? 'checked' : '' }}>
                <label for="rating_4">4 - Хорошо</label>
            </div>
            <div>
                <input type="radio" id="rating_5" name="rating" value="5" {{ old('rating') == '5' ? 'checked' : '' }}>
                <label for="rating_5">5 - Отлично</label>
            </div>
            @error('rating')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <label for="comments">Ваши комментарии:</label>
            <textarea id="comments" name="comments">{{ old('comments') }}</textarea>
            @error('comments')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="quest">
            <button type="submit">Отправить</button>
        </div>
    </form>
@endsection
