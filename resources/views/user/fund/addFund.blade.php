   <!--**********************************
            Content body start
        ***********************************-->
   <div class="content-body">
       <div class="container-fluid">
           <div class="row page-titles">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item active"><a href="javascript:void(0)">fund</a></li>
                   <li class="breadcrumb-item"><a href="javascript:void(0)">Add Fund</a></li>
               </ol>
           </div>
           <!-- row -->
           <div class="row">
            
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PAY HERE - USDTBEB20</h4>
                        </div>
                        <div class="card-body">
                       <div class="basic-form text-center">

                        <!-- QR Code -->
                        <div class="row mb-3">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data={{ urlencode($data['address_in']) }}"
                                 alt="QR Code"
                                 style="max-width:220px; margin:auto; display:block;">
                        </div>
                    
                    </br>
                        <!-- Wallet Address + Copy -->
                        <div class="copy-tooltip">
                            <input 
                                type="text" 
                                id="wallet-address" 
                                class="form-control text-center mb-3" 
                                style="width:100%; max-width:500px; margin:auto; background:transparent; border:1px solid #ccc; padding:8px; font-size:14px;" 
                                readonly 
                                value="{{ $data['address_in'] ?? '' }}">
                            
                            <button 
                                class="btn btn-success" 
                                onclick="copyFunctionwallet('wallet-address')">
                                Copy Text
                            </button>
                        </div>
                    
                    </div>



                            </div>
                        </div>
                    </div>
                </div>



               <!-- <div class="col-xl-6 col-lg-12">
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">Add Fund</h4>
                       </div>
                       <div class="card-body">
                           <div class="basic-form">
                               <form action="{{ route('user.SubmitBuyFund') }}" method="POST" enctype="multipart/form-data">

                                   {{ csrf_field() }}
                                   <div class="row">
                                       <div class="mb-3 col-md-12">
                                           <label class="form-label">Deposit (INR) <span class="tx-danger">*</span></label>
                                           <input type="number" min="1" class="form-control" name="amount" required="true" placeholder="Enter amount ">
                                       </div>
                                       <div class="mb-3 col-md-12">
                                           <label class="form-label">UTR No/Slip No <span class="tx-danger">*</span></label>
                                           <input type="text" class="form-control " name="transaction_hash" placeholder="Enter UTR No. " required="true">
                                       </div>
                                       <div class="mb-3 col-md-12">
                                           <label class="form-label">Upload Reciept <span class="tx-danger">*</span></label>
                                           <input type="file" class="form-control " name="icon_image" required="true">
                                       </div>

                                   </div>
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div> -->



           </div>
       </div>
   </div>
   <!--**********************************
                 Content body end
             ***********************************-->
   <script src="https://code.jquery.com//jquery-3.3.1.min.js"> </script>
   <script>
       function copyFunctionwallet(inputID) {

           var copyText = document.getElementById("wallet-address");

           copyText.select();

           document.execCommand("copy");
           $(".copyToClipboard").html("Copied");

           /* Alert the copied text */
           alert("copied: " + copyText.value)

       }

   </script>
<script>
  function copyWalletAddress() {
    const walletText = document.getElementById("walletAddressText").innerText;

    navigator.clipboard.writeText(walletText).then(() => {
      new Noty({
        type: 'success',
        text: '<i class="fal fa-check"></i> Wallet address copied!',
        timeout: 3000,
        progressBar: true,
        theme: 'relax',
        layout: 'topRight',
      }).show();
    }).catch(() => {
      new Noty({
        type: 'error',
        text: '<i class="fal fa-times"></i> Failed to copy.',
        timeout: 3000,
        progressBar: true,
        theme: 'relax',
        layout: 'topRight',
      }).show();
    });
  }
</script>