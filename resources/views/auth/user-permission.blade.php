@extends('layouts.app')

@section('title', 'User Permission')

@section('content')
    <div class="container">
        <h2 class="mt-5 mb-3">{{ __('User Permission') }}</h2>
        <form action="{{ route('user-permissions.update') }}" method="POST" id="permissionForm">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3 p-3">
                        <label for="user_id" class="form-label">{{ __('Select Employee') }}</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">{{ __('Choose Employee') }}</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->user_id }}">{{ $permission->user->empname }} ({{ $permission->user->empnumber }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-3 p-3">
                        <h4 class="mb-3">{{ __('Permissions') }}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>{{ __('General') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[dashboard]" value="1" {{ $permissions->dashboard ? 'checked' : '' }}>
                                    {{ __('Dashboard') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[adjestment]" value="1" {{ $permissions->adjestment ? 'checked' : '' }}>
                                    {{ __('Adjestment') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[customer]" value="1" {{ $permissions->customer ? 'checked' : '' }}>
                                    {{ __('Customer') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[supplier]" value="1" {{ $permissions->supplier ? 'checked' : '' }}>
                                    {{ __('Supplier') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[item]" value="1" {{ $permissions->item ? 'checked' : '' }}>
                                    {{ __('Item') }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <strong>{{ __('Products') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[products]" value="1" {{ $permissions->products ? 'checked' : '' }}>
                                    {{ __('Products (Folder)') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[product_category]" value="1" {{ $permissions->product_category ? 'checked' : '' }}>
                                    {{ __('Product Category') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[product]" value="1" {{ $permissions->product ? 'checked' : '' }}>
                                    {{ __('Product') }}
                                </div>

                                <strong>{{ __('Orders') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[purchase_order]" value="1" {{ $permissions->purchase_order ? 'checked' : '' }}>
                                    {{ __('Purchase Order') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[sales_order]" value="1" {{ $permissions->sales_order ? 'checked' : '' }}>
                                    {{ __('Sales Order') }}
                                </div>

                                <strong>{{ __('Store') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[store]" value="1" {{ $permissions->store ? 'checked' : '' }}>
                                    {{ __('Store (Folder)') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[warehouse]" value="1" {{ $permissions->warehouse ? 'checked' : '' }}>
                                    {{ __('Warehouse') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[stock_location]" value="1" {{ $permissions->stock_location ? 'checked' : '' }}>
                                    {{ __('Stock Location') }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <strong>{{ __('Transactions') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[transaction]" value="1" {{ $permissions->transaction ? 'checked' : '' }}>
                                    {{ __('Transaction') }}
                                </div>

                                <strong>{{ __('Settings') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[settings]" value="1" {{ $permissions->settings ? 'checked' : '' }}>
                                    {{ __('Settings (Folder)') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[users]" value="1" {{ $permissions->users ? 'checked' : '' }}>
                                    {{ __('Users') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[user_permission]" value="1" {{ $permissions->user_permission ? 'checked' : '' }}>
                                    {{ __('User Permission') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[theme]" value="1" {{ $permissions->theme ? 'checked' : '' }}>
                                    {{ __('Theme') }}
                                </div>

                                <strong>{{ __('Reports') }}</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[reports]" value="1" {{ $permissions->reports ? 'checked' : '' }}>
                                    {{ __('Reports (Folder)') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[sales_report]" value="1" {{ $permissions->sales_report ? 'checked' : '' }}>
                                    {{ __('Sales Report') }}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[purchase_report]" value="1" {{ $permissions->purchase_report ? 'checked' : '' }}>
                                    {{ __('Purchase Report') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 p-3">
                        <button type="submit" class="btn btn-primary">{{ __('Save Permission Changes') }}</button>
                    </div>
                </div>
            </div>
        </form>

        <h3 class="mt-4">{{ __('User Permissions List') }}</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th style="min-width: 120px;">{{ __('Employee No.') }}</th>
                                <th style="min-width: 180px;">{{ __('Employee Name') }}</th>
                                <th style="min-width: 120px;">{{ __('Dashboard') }}</th>
                                <th style="min-width: 150px;">{{ __('Adjustment') }}</th>
                                <th style="min-width: 150px;">{{ __('Customer') }}</th>
                                <th style="min-width: 150px;">{{ __('Supplier') }}</th>
                                <th style="min-width: 150px;">{{ __('Item') }}</th>
                                <th style="min-width: 180px;">{{ __('Products (Folder)') }}</th>
                                <th style="min-width: 160px;">{{ __('Product Category') }}</th>
                                <th style="min-width: 160px;">{{ __('Product') }}</th>
                                <th style="min-width: 180px;">{{ __('Purchase Order') }}</th>
                                <th style="min-width: 180px;">{{ __('Sales Order') }}</th>
                                <th style="min-width: 180px;">{{ __('Store (Folder)') }}</th>
                                <th style="min-width: 160px;">{{ __('Warehouse') }}</th>
                                <th style="min-width: 160px;">{{ __('Stock Location') }}</th>
                                <th style="min-width: 160px;">{{ __('Transaction') }}</th>
                                <th style="min-width: 180px;">{{ __('Settings (Folder)') }}</th>
                                <th style="min-width: 160px;">{{ __('Users') }}</th>
                                <th style="min-width: 160px;">{{ __('User Permissions') }}</th>
                                <th style="min-width: 160px;">{{ __('Themes') }}</th>
                                <th style="min-width: 180px;">{{ __('Reports (Folder)') }}</th>
                                <th style="min-width: 180px;">{{ __('Sales Report') }}</th>
                                <th style="min-width: 180px;">{{ __('Purchase Report') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->user->empnumber }}</td>
                                    <td>{{ $permission->user->empname }}</td>
                                    <td><input type="checkbox" {{ $permission->dashboard ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->adjestment ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->customer ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->supplier ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->item ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->products ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->product_category ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->product ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->purchase_order ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->sales_order ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->store ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->warehouse ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->stock_location ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->transaction ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->settings ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->users ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->user_permission ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->theme ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->reports ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->sales_report ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" {{ $permission->purchase_report ? 'checked' : '' }} disabled></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_id').change(function() {
                var userId = $(this).val();
                if (userId) {
                    $.ajax({
                        url: '/get-user-permissions/' + userId,
                        type: 'GET',
                        success: function(response) {
                            $('input[type="checkbox"]').prop('checked', false); // Uncheck all first
                            $.each(response.permissions, function(key, value) {
                                if (value) {
                                    $('#' + key).prop('checked', true);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
