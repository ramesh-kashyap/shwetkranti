   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Support</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Generate Ticket</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
     
     
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Generate Ticket</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                  
                                    <form action="{{ route('user.SubmitTicket') }}" method="POST">
                                     {{ csrf_field() }}

                                     <br>    
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Select Category</label>
                                                <select class="form-control" name="category" required="true">
                                                    <option value="">Select Category</option>
                                                    <option value="Verification">Verification </option>
                                                    <option value="Technical">Technical</option>
                                                    <option value="Team Building">Team Building </option>
                                                    <option value="Financial">Financial</option>
                                                    <option value="Fund Issue">Fund Issue</option>
                                                    <option value="Others">Others</option>
                                            </select>
                                            </div>
     
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Ticket No</label>
                                                <input type="number" class="form-control "
                                                name="ticket_no"
                                                placeholder="Enter Tickets Number.. ">
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Message</label>
                                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                            </div>
                                           
                                        </div>
     
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" required type="checkbox">
                                                <label class="form-check-label">
                                                    Check me out
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
     