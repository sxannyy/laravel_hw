@extends('main_layout')

@section('content')
    <h2>Ответы пользователей</h2>

    @if (count($allResponses) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Имя пользователя</th>
                    <th>Электронная почта</th>
                    <th>Возраст</th>
                    <th>Пол</th>
                    <th>Оценка удобства</th>
                    <th>Комментарии</th>
                    <th>Дата отправки</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allResponses as $response)
                    <tr>
                        <td>{{ $response['username'] }}</td>
                        <td>{{ $response['email'] }}</td>
                        <td>{{ $response['age'] }}</td>
                        <td>
                            @switch($response['gender'])
                                @case('male')
                                    Мужской
                                    @break
                                @case('female')
                                    Женский
                                    @break
                                @case('other')
                                    Другой
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $response['rating'] }} / 5</td>
                        <td>{{ $response['comments'] ?? 'Нет комментариев' }}</td>
                        <td>{{ $response['submitted_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Данных пока нет.</p>
    @endif
@endsection
