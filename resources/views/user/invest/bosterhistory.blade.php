


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)"> By Self  Package </a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">By Self  Package Report</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">By Self  Package Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#S.NO</th>
                                                <th>User ID</th>
                                                <th>Amount</th>
                                                <th>Transaction Date</th>
                                                <!--<th>Transaction ID</th>-->
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($deposit_list) || is_object($deposit_list)){ ?>

                                                <?php $cnt = 0; ?>
                                                @foreach($deposit_list as $value)
                                                    <tr>
                                                        <td><?= $cnt += 1?></td>
                                                        <td>{{ $value->user_id_fk }}</td>
    
                                                        <td>{{currency()}} {{ $value->amount }}</td>
                                                        <td>{{ $value->created_at }}</td>
                                                        <!--<td>{{ $value->transaction_id }}</td>-->
                                                        <td><span
                                                            class="badge badge-{{ ($value->status=='Active')?'success':'danger' }}">{{ $value->status }}</span></td>
    
                                                    </tr>
                                                @endforeach
    
                                                <?php }?>

                                        </tbody>
                                    </table>
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
