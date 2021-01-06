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
                        @forelse($callbacks as $invoice)
                            <tr>
                                <th scope="row">{{ $invoice->id }}</th>
                                <td>{{ $invoice->name }}</td>
                                <td>{{ $invoice->email }}</td>
                                <td>{{ $invoice->phone }}</td>
                                <td>
                                    @if($invoice->check)
                                        <span class="badge badge-pill badge-success">Обработан: {{ $invoice->user->email }}</span>
                                    @else
                                        <span class="badge badge-pill badge-info">Не обработана</span>
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->can('edit invoice') and !$invoice->check)
                                        <a href="{{ route('update', $invoice->id) }}" class="badge badge-success">Обработать</a>
                                    @endif
                                    @can('delete invoice')
                                        <a href="{{ route('delete', $invoice->id) }}" class="badge badge-danger">Удалить</a>
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
                    {{ $callbacks->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
