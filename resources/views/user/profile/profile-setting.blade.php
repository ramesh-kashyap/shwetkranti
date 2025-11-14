   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                
                <div class="row">
                   
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Personal Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('user.update-profile') }}" method="POST">
                                     {{ csrf_field() }}
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Sponsor ID <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name=""  value="{{ $profile_data->sponsor_detail ? $profile_data->sponsor_detail->username : '0' }}" readonly>
                                            </div>


                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">User ID <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="memberID" value="{{ $profile_data ? $profile_data->username : '' }}" readonly>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">User Name <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="name" value="{{ $profile_data ? $profile_data->name : '' }}" readonly placeholder="Enter User Name" required>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Mobile <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="number" value="{{ $profile_data ? $profile_data->phone : '' }}" readonly placeholder="Enter Mobile Number" name="phone">
                                            </div>


                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Email <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="email" name="email" value="{{ $profile_data ? $profile_data->email : '' }}" readonly placeholder="Enter Email" readonly>
                                            </div> 
                                            
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">USDTBEB20 ADDRESS<span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="trx_addres"  {{ (!empty($profile_data->trx_addres)) ? 'readonly' : '' }} value="{{ $profile_data ? $profile_data->trx_addres : '' }}"  placeholder="USDTBEB20 ADDRESS" >
                                            </div>

                                           


                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
                 Content body end
             ***********************************-->
     