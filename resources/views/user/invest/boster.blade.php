   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <div class="container-fluid">
              <div class="row page-titles">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Activation</a></li>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">By Self  Package</a></li>
                  </ol>
              </div>
              <!-- row -->
              <div class="row">
   

   
                  <div class="col-xl-6 col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title"> By Self  Package</h4>
                          </div>
                          <div class="card-body">
                              <div class="basic-form">
                                
                                  <form action="{{ route('user.bosterActivation') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}

                              <h5>  Self  Wallet Balance  {{ currency() }}{{ number_format(Auth::user()->boster_balance(), 2) }}</h5>
                                      <div class="row">
                                          
                                          
                                          
<div class="mb-3 col-md-12">
    <label class="form-label">Wallet Type</label>
    <select name="walletType" class="form-control" required>
        <option value="">-- Select Wallet --</option>
        <option value="2">Self Wallet:{{ currency() }} {{ number_format((Auth::user()->boster_balance()>=0)?Auth::user()->boster_balance():0, 2) }}</option>
        <option value="1">Main Wallet:{{ currency() }} {{ number_format((Auth::user()->available_balance()>=0)?Auth::user()->available_balance():0, 2) }}</option>
    </select>
</div>
                                          
                                          <div class="mb-3 col-md-12">
                                              <label class="form-label"> Amount</label>
                                            
                                           
                                              
                                               <input class="form-control"  type="number"    placeholder=""  name="amount"
                                                  value="10" disabled>
                                                  
                                          </div>
   
                                          <div class="mb-3 col-md-12">
                                              <label class="form-label">Payment Mode</label>
                                              <input class="form-control" readonly type="text" placeholder=""  name=""
                                                  value="USDT" disabled>
                                          </div>


                                        <!--<div class="mb-3 col-md-12">-->
                                        <!--    <label class="form-label">Transaction Password</label>-->

                                        <!--    <input maxlength="140" step="" enterkeyhint="done" required="" autocomplete="off" placeholder="Transaction Password" name="transaction_password" type="" class="form-control">-->
                                        <!--</div>-->



                                      </div>
   
                                      <div class="mb-3">
                                          <div class="form-check">
                                              <input class="form-check-input" required type="checkbox">
                                              <label class="form-check-label">
                                                  Check me out
                                              </label>
                                          </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary submit-btn">Submit</button>
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
   
           <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>
    <script>
        function amtValue() {
            var amt = document.getElementById('PACKAGE_AMT').value;
            if (amt % 20 == 0) {
                return true;
            } else {
                alert('Please enter valid amount Multiple of Rs. 20  ');
                return false;
            }
        }



        $('.check_sponsor_exist').keyup(function(e) {
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var sponsor = $(this).val();
            // alert(sponsor); 
            $.ajax({
                type: "POST"
                , url: "{{ route('getUserName') }}"
                , data: {
                    "user_id": sponsor
                    , "_token": "{{ csrf_token() }}"
                , }
                , success: function(response) {
                    // alert(response);      
                    if (response != 1) {
                        // alert("hh");
                        $(".submit-btn").prop("disabled", false);
                        $('#' + res_area).html(response).css('color', '#000').css('font-weight', '800')
                            .css('margin-buttom', '10px');
                    } else {
                        // alert("hi");
                        $(".submit-btn").prop("disabled", true);
                        $('#' + res_area).html("User Not exists!").css('color', 'red').css(
                            'margin-buttom', '10px');
                    }
                }
            });
        });

        function copyFunctionwallet(inputID) {

            var copyText = document.getElementById("wallet-address");

            copyText.select();

            document.execCommand("copy");
            $(".copyToClipboard").html("Copied");

            }


    </script>
