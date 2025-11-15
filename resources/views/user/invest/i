<div class="content-body" style="min-height: 732px;">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Investment</h4>
                    </div>
                    <div class="card-body">
                        <form id="depositForm" method="post"
                            action="{{ route('user.confirmDeposit') }}">
                            @csrf

                            @if ($errors->any())
                            <div style="color: red; margin-bottom: 10px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Success Notification --}}
                            @if(session('notify'))
                            <div style="color: green; margin-bottom: 10px;">
                                @foreach(session('notify') as $n)
                                <p>{{ $n[1] }}</p>
                                @endforeach
                            </div>
                            @endif
                            <div class="row">
                                <div class="form-group">
                                    <label class="form--label">Enter Amount</label>
                                    <input type="number" class="form-control form--control md-style"
                                        name="amount" min="1000" placeholder="Enter your Amount" required>
                                </div>

                                <div class="form-group">
                                    <label class="form--label">Payment Mode</label>
                                    <select name="paymentMode" required
                                        class="form-control form--control md-style">
                                        <option value="INR">INR</option>
                                        <option value="USDT">USDT</option>
                                         <option value="CHECK">CHECK</option>

                                    </select>
                                </div>

                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn me-2 btn-primary">Submit</button>
                            </div>
                        </form>
@include('partials.notify')

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>