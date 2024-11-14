@include('landingpage.include.top')


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('assets/images/woman-holding-bunch-paper-bags_23-2147688380.gpg.avif') }}');">
	<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Welcome to our online shopping destination, where we bring together three unique malls, each designed to meet the diverse needs of every family member, all in one convenient place. Our journey began with a simple goal: to create a one-stop shop for families to access a wide range of products that simplify their lives and enhance their daily experiences. From essential household items and fashion to electronics and specialty products, we offer a comprehensive selection for everyone in the family.
                        Our three malls each provide a distinctive shopping experience, yet they are united by a shared commitment to quality, variety, and convenience. We believe in saving you time and effort by making shopping easy, enjoyable, and accessible from anywhere. At the heart of our mission is the vision of bringing families together through a seamless shopping experience that fits their busy lives.
						</p>

						
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ asset('assets/images/istockphoto-1330995637-612x612.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Our mission is to create an accessible and seamless shopping experience that meets the diverse needs of families in one convenient location. By bringing together three unique malls, we aim to provide quality, variety, and affordability across all essential categories—ensuring that every family member finds what they need with ease. We are dedicated to enhancing the shopping journey by offering an online destination that saves time, simplifies choices, and delivers exceptional value. Through our commitment to convenience, customer satisfaction, and community, we aspire to be a trusted resource for families everywhere.						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
							"Creativity is about bringing together small details to create something bigger that serves the family, which is our aim here. We provide you with a place that brings together everything a family needs in one convenient spot, making access to your essentials simple and seamless."							</p>

							
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{ asset('assets/images/istockphoto-2040713593-612x612.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

	@include('landingpage.include.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
</html>