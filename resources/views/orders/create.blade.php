@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">

        <x-alert/>

        <div class="row row-cards">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">
                                        {{ __('Create Order') }}
                                    </h3>
                                </div>

                                <div class="card-actions btn-actions">
                                    <a href="{{ route('orders.index') }}" class="btn-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="date" class="form-label required">
                                            {{ __('Order Date') }}
                                        </label>

                                        <input name="date" id="date" type="date"
                                                class="form-control example-date-input
                                                @error('date') is-invalid @enderror"
                                                value="{{ old('date') ?? now()->format('Y-m-d') }}"
                                                required
                                        >

                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <x-tom-select
                                        label="Customers"
                                        id="customer_id"
                                        name="customer_id"
                                        placeholder="Select Customer"
                                        :data="$customers"
                                    />

                                    <div class="col-md-4">
                                        <label for="payment_type" class="form-label required">
                                            {{ __('Payment Type') }}
                                        </label>

                                        <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror" required>
                                            <option value="">Select Payment Type</option>
                                            <option value="HandCash">HandCash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Due">Due</option>
                                        </select>

                                        @error('payment_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="pay" class="form-label required">
                                            {{ __('Pay Amount') }}
                                        </label>

                                        <input type="number" class="form-control @error('pay') is-invalid @enderror"
                                                id="pay"
                                                name="pay"
                                                value="{{ old('pay') }}"
                                                required
                                        >

                                        @error('pay')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <livewire:order-form :cart-instance="'order'" />
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Order') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
