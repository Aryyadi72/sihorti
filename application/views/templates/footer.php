<hr>
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-none fs-4" style="text-align:center;text-size:50px;margin-top:30px;">
                <marquee>2023 &copy; SIHORTI</marquee>
        </div>
    </div>
</footer>
<hr>
</div>
</div>
<script src="<?php echo base_url(""); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(""); ?>assets/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="<?php echo base_url(""); ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url(""); ?>assets/js/pages/dashboard.js"></script>

<script src="<?php echo base_url(""); ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?php echo base_url(""); ?>assets/js/pages/simple-datatables.js"></script>
<script>
		$(document).ready(function () {
			$('#table1').DataTable();
		});
	</script>

<script>
    document.getElementById('exportBtn').addEventListener('click', function() {
        var exportURL = "<?php echo base_url("laporan_mingguan/exportrekap"); ?>";
        window.location.href = exportURL;
    });
</script>

</body>

</html>