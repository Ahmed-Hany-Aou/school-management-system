@extends('admin.admin_master')
@section('admin')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('password.update') }}" id="passwordForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="oldpassword" id="current_password" class="form-control" required>
                                                <button type="button" onclick="togglePassword('current_password')" class="btn btn-outline-secondary btn-sm">Show</button>
                                                @error('oldpassword')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="form-control" required>
                                                <button type="button" onclick="togglePassword('password')" class="btn btn-outline-secondary btn-sm">Show</button>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                <button type="button" onclick="togglePassword('password_confirmation')" class="btn btn-outline-secondary btn-sm">Show</button>
                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        field.type = field.type === 'password' ? 'text' : 'password';
    }

    document.getElementById('passwordForm').onsubmit = function(event) {
        const currentPassword = document.getElementById('current_password').value;
        const newPassword = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;

        // Check if new password and confirmation match
        if (newPassword !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'New password and confirmation do not match!',
            });
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Check if new password is the same as current password
        if (currentPassword === newPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'New password cannot be the same as current password!',
            });
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Check for server-side error messages
        @if ($errors->has('oldpassword'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first('oldpassword') }}',
            });
            event.preventDefault(); // Prevent form submission
            return;
        @endif

        // Check for success message
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('login') }}"; // Redirect to login
            });
        @endif
    };
</script>

@endsection