@extends('layouts.app')

@section('title', 'User Permission')

@section('content')
    <div class="container">
        <h2 class="mt-5 mb-3">{{ __('User Permission') }}</h2>
        <form action="{{ route('user-permissions.store') }}" method="POST" id="permissionForm">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">{{ __('Select User') }}</label>
                            <select id="user_id" name="user_id" class="form-control" required>
                                <option value="">{{ __('Choose a user') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->empname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="permissionsContainer" class="mb-3">
                            <h5 class="form-label mt-3">{{ __('Permissions') }}</h5>
                            <div class="row">
                                @php
                                    $permissions = [
                                        'dashboard' => 'Dashboard',
                                        'adjestment' => 'Adjustment',
                                        'customer' => 'Customer',
                                        'supplier' => 'Supplier',
                                        'item' => 'Item',
                                        'products' => 'Products',
                                        'product_category' => 'Product Category',
                                        'product' => 'Product',
                                        'purchase_order' => 'Purchase Order',
                                        'sales_order' => 'Sales Order',
                                        'store' => 'Store',
                                        'warehouse' => 'Warehouse',
                                        'stock_location' => 'Stock Location',
                                        'transaction' => 'Transaction',
                                        'settings' => 'Settings',
                                        'users' => 'Users',
                                        'user_permission' => 'User Permission',
                                        'theme' => 'Theme',
                                        'reports' => 'Reports',
                                        'sales_report' => 'Sales Report',
                                        'purchase_report' => 'Purchase Report'
                                    ];
                                @endphp

                                @foreach($permissions as $key => $label)
                                    <div class="form-check col-md-4">
                                        <input type="hidden" name="permissions[{{ $key }}]" value="0">
                                        <input class="form-check-input" type="checkbox" name="permissions[{{ $key }}]" id="permission_{{ $key }}" value="1">
                                        <label class="form-check-label" for="permission_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('user_id').addEventListener('change', function() {
            let userId = this.value;
            if (userId) {
                fetch(`/user-permissions/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                            checkbox.checked = false;
                        });

                        if (data.permissions) {
                            for (const [key, value] of Object.entries(data.permissions)) {
                                let checkbox = document.getElementById(`permission_${key}`);
                                if (checkbox) {
                                    checkbox.checked = value === 1;
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error fetching permissions:', error));
            } else {
                document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
            }
        });

        document.getElementById('permissionForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const userId = document.getElementById('user_id').value;
            if (!userId) {
                alert('Please select a user to update permissions.');
                return;
            }

            // Gather permission values
            const permissions = {};
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                permissions[checkbox.name.replace('permissions[', '').replace(']', '')] = checkbox.checked ? 1 : 0;
            });

            // Send the updated permissions to the server
            fetch(`/user-permissions/${userId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ permissions })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Permissions updated successfully!');
                } else {
                    alert('Failed to update permissions.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
