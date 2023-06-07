<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded-top p-4">
		<div class="row">
			<div class="col-12 col-sm-6 text-center text-sm-start">
				&copy; <a href="#">Cipanas</a>, Subang.
			</div>
			<div class="col-12 col-sm-6 text-center text-sm-end">
				<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
				Subang<a href="https://htmlcodex.com">Selajambe</a>
				</br>
				Kuningan <a class="border-bottom" href="https://themewagon.com" target="_blank">Jawabarat</a>
			</div>
		</div>
	</div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>backend/lib/chart/chart.min.js"></script>
<script src="<?= base_url() ?>backend/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>backend/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>backend/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>backend/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?= base_url() ?>backend/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?= base_url() ?>backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<!-- Template Javascript -->
<script src="<?= base_url() ?>backend/js/main.js"></script>
<script>
	console.log = function() {}
	$("#pesan_produk").on('change', function() {

		$(".name").html($(this).find(':selected').attr('data-name'));
		$(".name").val($(this).find(':selected').attr('data-name'));

		$(".price").html($(this).find(':selected').attr('data-price'));
		$(".price").val($(this).find(':selected').attr('data-price'));
	});
</script>
<script>
	function opsi(value) {
		var st = $("#ok").val();
		if (st == "1") {
			document.getElementById("inputku").disabled = false;
		} else if (st == "3") {
			document.getElementById("inputku").disabled = false;
		} else {
			document.getElementById("inputku").disabled = true;
		}
	}
</script>
</body>

</html>