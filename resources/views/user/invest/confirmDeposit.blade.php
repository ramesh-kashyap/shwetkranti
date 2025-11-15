@include('layouts.upnl.header')

<div class="content-body" style="min-height: 732px;">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Investment</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.fundActivation') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="amount" value="{{ $amount }}">
                            <input type="hidden" name="paymentMode" value="{{ $paymentMode }}">
                            @if($paymentMode == 'INR')
                            <!-- INR Bank Details -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">Company Ac. Number</label>
                                        <input type="number" class="form-control form--control md-style"
                                            name="account_no" readonly value="{{ $bankDetails->account_no }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">IFSC Code</label>
                                        <input type="text" class="form-control form--control md-style"
                                            name="ifsc_code" readonly value="{{ $bankDetails->ifsc_code }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">Branch Name</label>
                                        <input type="text" class="form-control form--control md-style"
                                            name="branch_name" readonly value="{{ $bankDetails->branch_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">Bank Name</label>
                                        <input type="text" class="form-control form--control md-style"
                                            name="bank_name" readonly value="{{ $bankDetails->bank_name }}">
                                    </div>
                                </div>
                            </div>
                            @elseif($paymentMode == 'USDT')
                            <!-- USDT QR Scanner -->
                            <div class="text-center mb-3">
                                <label class="form--label">USDT Payment</label>
                                <div>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=={{ $wallet_address }}&choe=UTF-8"
                                        alt="Wallet QR Code" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <p class="mt-2">
                                    <strong>Wallet Address:</strong> <br>
                                    <span id="walletAddress">{{ $wallet_address }}</span>
                                    <button type="button" onclick="copyWalletAddress()" class="wallet-copy-btn">
                                        Copy
                                    </button>
                                </p>
                                <script>
                                    function copyWalletAddress() {
                                        const walletText = document.getElementById("walletAddress").innerText;
                                        navigator.clipboard.writeText(walletText).then(() => {
                                            alert("Wallet address copied!");
                                        }).catch(err => {
                                            console.error("Error copying text: ", err);
                                        });
                                    }
                                </script>

                                <style>
                                    /* Sirf wallet copy button ke liye style */
                                    .wallet-copy-btn {
                                        font-size: 12px;
                                        padding: 2px 6px;
                                        margin-left: 5px;
                                        border-radius: 4px;
                                        border: 1px solid #007bff;
                                        background-color: #007bff;
                                        color: #fff;
                                        cursor: pointer;
                                    }

                                    .wallet-copy-btn:hover {
                                        background-color: #0056b3;
                                        border-color: #0056b3;
                                    }
                                </style>
                            </div>
                            @endif

                            <!-- Common Fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">Amount</label>
                                        <input type="number" class="form-control form--control md-style"
                                            value="{{ $amount }}" readonly name="amount">
                                    </div>
                                </div>
 
                                <div class="col-md-6">
        <div class="form-group">
           
              
           @if($paymentMode == 'INR')
                <label class="form--label">Enter UTR No</label>
                <input type="text" class="form-control form--control md-style"
                    placeholder="Enter UTR No" name="utrno" required>
                      @elseif($paymentMode == 'USDT')

                      <label class="form--label">Transaction Password </label>
                       <input type="text" class="form-control form--control md-style"
                    placeholder="Transaction Password" name="utrno" required>

 @endif
                
         
        </div>
    </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">Upload Receipt</label>
                                        <input type="file" class="form-control form--control md-style"
                                            name="account" required accept=".jpg, .jpeg, .png">
                                        <pre class="text--base mt-1">Supported mimes: jpg, jpeg, png</pre>
                                    </div>
                                </div>
                            </div>

                             <div class="form-group mt-4">
                                <button type="submit" class="btn me-2 btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.upnl.footer')
