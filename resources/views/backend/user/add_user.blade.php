@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add User</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('users.store') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="usertype" id="usertype" required class="form-control">
                                                    <option value="" selected disabled>Select Role</option>
                                                    <option value="Student" {{ old('usertype') == 'Student' ? 'selected' : '' }}>Student</option>
                                                    <option value="Employee" {{ old('usertype') == 'Employee' ? 'selected' : '' }}>Employee</option>
                                                    <option value="Admin" {{ old('usertype') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required value="{{ old('name') }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required value="{{ old('email') }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Password <span class="text-danger">*</span></h5>
                                            <div class="input-group">
                                                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password" pattern=".{6,}">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary toggle-password" data-target="password">Show</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="input-group">
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary toggle-password" data-target="password_confirmation">Show</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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
    const passwordToggles = document.querySelectorAll('.toggle-password');

    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const targetId = toggle.dataset.target;
            const input = document.getElementById(targetId);
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            toggle.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    });
</script>

@endsection