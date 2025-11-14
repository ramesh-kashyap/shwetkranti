@include('partials.notify')
  

		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
		
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="{{generalDetail()->siteurl}}" target="_blank">{{siteName()}}</a> 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('')}}upnl/vendor/global/global.min.js"></script>
	<script src="{{asset('')}}upnl/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="{{asset('')}}upnl/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('')}}upnl/vendor/apexchart/apexchart.js"></script>
	<script src="{{asset('')}}upnl/vendor/nouislider/nouislider.min.js"></script>
	<script src="{{asset('')}}upnl/vendor/wnumb/wNumb.js"></script>
	
    <!-- Datatable -->
    <script src="{{asset('')}}upnl/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('')}}upnl/js/plugins-init/datatables.init.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('')}}upnl/js/dashboard/dashboard-1.js"></script>

    <script src="{{asset('')}}upnl/js/custom.min.js"></script>
	<script src="{{asset('')}}upnl/js/dlabnav-init.js"></script>
    <script src="{{asset('')}}upnl/js/styleSwitcher.js"></script>
	
</body>
</html>