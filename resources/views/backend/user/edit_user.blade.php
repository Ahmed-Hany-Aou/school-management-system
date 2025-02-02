@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms --> 
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit User</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('users.update', $editData->id) }}" autocomplete="off">
	 	@csrf
					  <div class="row">
						<div class="col-12">	


<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>User Role <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="usertype" required="" class="form-control">
			<option value="" selected="" disabled="">Select Role</option>
 <option value="Admin" {{ ($editData->usertype == "Admin" ? "selected": "") }}  >Admin</option>
 <option value="Student" {{ ($editData->usertype == "Student" ? "selected": "") }} >Student</option>
 <option value="Employee" {{ ($editData->usertype == "Employee" ? "selected": "") }} >Employee</option>
			 
		</select>
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>User Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="" autocomplete="off">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->



    <div class="row">
	<div class="col-md-6" >

		<div class="form-group">
		<h5>User Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="" autocomplete="off">  </div>
		 
	</div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
		
 

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Password</h5>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" pattern=".{6,}">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('password').type = document.getElementById('password').type === 'password' ? 'text' : 'password'; this.textContent = document.getElementById('password').type === 'password' ? 'Show' : 'Hide'">Show</button>
                </div>
            </div>
            <small>Leave blank to keep current password</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Confirm Password</h5>
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('password_confirmation').type = document.getElementById('password_confirmation').type === 'password' ? 'text' : 'password'; this.textContent = document.getElementById('password_confirmation').type === 'password' ? 'Show' : 'Hide'">Show</button>
                </div>
            </div>
        </div>
    </div>
</div>

 
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

 

 
	  
	  </div>
  </div>

@endsection