   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Withdrawal</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Withdrawal Request</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">


                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Withdrawal Request</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <code class="badge badge-rounded badge-outline-warning" style="color: #fffbff;font-size:15px">Available Balance : <b>{{ number_format(Auth::user()->available_balance(), 2) }} {{ currency() }} </b></code>
                                    <br>
                                    <form   action="{{ route('user.Withdraw-Request') }}" method="POST">
                                     {{ csrf_field() }}

                                     <br>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Enter Amount</label>
                                                <input class="form-control" placeholder="Enter Amount" id="" min="5" required type="number" name="amount"
                                                    value="" >
                                            </div>

                                          <div class="mb-3 col-md-12">
                                              <label class="form-label">Payment Mode</label>
                                          

                                                    <select name="paymentMode" required
                                        class="form-control">
                                        <option value="INR">INR</option>
                                        <option value="USDT">USDT</option>

                                    </select>
                                          </div>


                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Transaction Password</label>
                                                <input class="form-control"  type="password" required placeholder="Transaction Password"  name="transaction_password"
                                                    value="">
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
       <script>
    function onsubmit_func()
    {

        var withw=$('#withdrawal_amt').val();


    confirm("Are You Sure You Want to Withdrawal " + withw );
     $('#btn1').hide();
     $('#btn2').show();

    }
  setTimeout(function(){
    $('#btn2').hide();
    $('#btn1').show();
   }, 300);
    </script>
