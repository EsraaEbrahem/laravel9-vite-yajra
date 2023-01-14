@extends('admin.layouts.app')
@section('content')
    @include('admin.subscribers.edit')
    @include('admin.subscribers.show')
    @include('admin.subscribers.create')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Manage Subscribers
                <p class="text-danger" id="g-error-message"></p>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-success create-item"
                        data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class='bi bi-plus'></i>
                </button>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
