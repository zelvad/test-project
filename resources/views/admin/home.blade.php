@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Заявки на обратную связь</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($applications as $application)
                            <tr>
                                <th scope="row">{{ $application->id }}</th>
                                <td>{{ $application->name }}</td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->phone }}</td>
                                <td>
                                    @if($application->status)
                                        <span class="badge badge-pill badge-success">Обработан: {{ $application->user->email }}</span>
                                    @else
                                        <span class="badge badge-pill badge-info">Не обработана</span>
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->can('edit invoice') and !$application->status)
                                        <a href="{{ route('update', $application->id) }}" class="badge badge-success">Обработать</a>
                                    @endif
                                    @can('delete invoice')
                                        <a href="{{ route('delete', $application->id) }}" class="badge badge-danger">Удалить</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-primary" role="alert">
                                Заявок еще не было :(
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $applications->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
