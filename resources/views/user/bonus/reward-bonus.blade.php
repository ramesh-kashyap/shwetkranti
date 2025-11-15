<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profit Summary </a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Reward Bonus</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reward Bonus</h4>
                    </div>
                    <div class="card-body">

                      

                        <div class="table-responsive">
                           

                            <table id="example" class="display" style="min-width: 845px;">
                                <thead>
                                    <tr style="background:#5bcfc5; ">
                                          <th style="color:#000;">Level</th>
                                        <th style="color:#000;">A Leg</th>
                                        <th style="color:#000;">B Leg</th>
                                        <th style="color:#000;">Reward</th>
                                        <th style="color:#000;">Status</th>
                                    </tr>
                                </thead>
                                <tbody style="color: #9fa4a6;">
                                    <?php
                                    if ($first_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($second_lvl > 0) {
                                            $color = 'rgb(251, 189, 24)';
                                            $active = '';
                                        } else {
                                            $color = '#74d28c !important ';
                                            $active = '( Active )';
                                        }
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>1</td>
                                        <!-- <td>STAR</td> -->
                                        <td>  20 PV</td>
                                        <td>  20 PV</td>
                                        <td>{{currency()}}5000/Pure Gee</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($second_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($third_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                         <td>2</td>
                                        <!-- <td>STAR</td> -->
                                        <td>  50 PV</td>
                                        <td>  50 PV</td>
                                        <td>{{currency()}}12000/Android Mobile</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($third_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($four_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>3</td>
                                        <td>  100 PV</td>
                                        <td>  100 PV</td>
                                        <td>{{currency()}}25000/Sedan Car Down Payment</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($four_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($five_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>4</td>
                                        <!-- <td>SILVER STAR</td> -->
                                        <td>  500 PV</td>
                                        <td>  500 PV</td>
                                        <td>{{currency()}}250000/Bullet Motorcycle</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($five_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($six_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>5</td>
                                        <!-- <td>PEARL STAR</td> -->
                                        <td>  1000 PV</td>
                                        <td>  1000 PV</td>
                                        <td>{{currency()}}1250000/Fully Paid Car</td>

                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($six_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($seven_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>6</td>
                                        <!-- <td>GOLD STAR</td> -->
                                        <td>  5000 PV</td>
                                        <td>  5000 PV</td>
                                        <td>{{currency()}}3000000/Nexon (Base Model)</td>

                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($seven_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($eight_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>7</td>
                                        <!-- <td>PLATINUM cSTAR</td> -->
                                        <td>  10000 PV</td>
                                        <td>  10000 PV</td>
                                        <td>{{currency()}}1.25 Crore/Harrier</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($eight_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($nine_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                        <td>8</td>
                                        <!-- <td>RUBY</td> -->
                                        <td>  500000 PV</td>
                                        <td>  500000 PV</td>
                                        <td>{{currency()}}2.5 Crore/Defender</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($nine_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($ten_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                         <td>9</td>
                                        <!-- <td>RUBY</td> -->
                                        <td>  1000000 PV</td>
                                        <td>  1000000 PV</td>
                                        <td>{{currency()}}2.5 Crore/Villa</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($ten_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($eleven_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                    <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                           <td>10</td>
                                        <!-- <td>RUBY</td> -->
                                        <td>  5000000 PV</td>
                                        <td>  5000000 PV</td>
                                        <td>{{currency()}}12.5 Crore/Luxury Farmhouse</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                    <?php
                                    if ($eleven_lvl > 0) {
                                        $status = 'Achieved';
                                        if ($twel_lvl > 0) $color = 'rgb(251,189,24)';
                                        else $color = '#74d28c !important ';
                                    } else {
                                        $status = 'Pending';
                                        $color = 'none';
                                    }
                                    ?>
                                 <tr style="background:<?= @$color ?>;color:#9fa4a6;font-weight:600;">
                                           <td>11</td>
                                        <!-- <td>RUBY</td> -->
                                        <td>  10000000 PV</td>
                                        <td>  10000000 PV</td>
                                        <td>{{currency()}}25.50 Crore/4BHK Sea-Facing Dubai Flat</td>
                                        <td><?= @$status ?></td>
                                    </tr>

                                </tbody>
                            </table>
                            <br>

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