<div class="content-body">
   <div class="container-fluid">
      <!-- row -->
      <div class="row">
         <div class="col-xl-6 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Wallet Transfer</h4>
               </div>
               <div class="card-body">
                  <div class="basic-form">
                     <form action="{{route('user.walletTransfers')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h5>  Total Fund Balance {{ currency() }}{{ number_format(Auth::user()->fund_balance(), 2) }}</h5>
                        <div class="row">
                           <div class="mb-3 col-md-12">
                              <label class="form-label"> Amount</label>
                              <input class="form-control"  type="number"    placeholder="Enter your transfer amount"  name="amount"
                                 required>
                           </div>
                        </div>
                        <!--<div class="mb-3">-->
                        <!--    <div class="form-check">-->
                        <!--        <input class="form-check-input" required type="checkbox">-->
                        <!--        <label class="form-check-label">-->
                        <!--            Check me out-->
                        <!--        </label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <button type="submit" class="btn btn-primary submit-btn">Transfer into Self walllet</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>