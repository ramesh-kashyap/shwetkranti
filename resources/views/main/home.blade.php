<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  <meta name="description" content="{{siteName()}} | Home" />
    <meta property="og:title" content="{{siteName()}} | Home" />
    <meta property="og:description" content="{{siteName()}} | Home" />
       <meta property="og:image" content="{{asset('upnl/images/tronfx.png')}}"			
		<!-- SITE TITLE -->
		<title>{{siteName()}}</title>			
		<!-- Latest Bootstrap min CSS -->
		<link rel="stylesheet" href="{{asset('')}}web-assets/bootstrap/css/bootstrap.min.css">	
		  <link rel="icon" type="image/x-icon" href="{{asset('')}}web-assets/img/favicon.1.png">
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">  		
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="{{asset('')}}web-assets/fonts/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('')}}web-assets/fonts/themify-icons.css">
		<link rel="stylesheet" href="{{asset('')}}web-assets/css/materialdesignicons-min.css">	
		<!--- owl carousel Css-->
		<link rel="stylesheet" href="{{asset('')}}web-assets/owlcarousel/css/owl.carousel.css">
		<link rel="stylesheet" href="{{asset('')}}web-assets/owlcarousel/css/owl.theme.css">	
		<!-- animate CSS -->
		<link rel="stylesheet" href="{{asset('')}}web-assets/css/animate.css">					
		<!-- MAGNIFIC CSS -->
		<link rel="stylesheet" href="{{asset('')}}web-assets/css/magnific-popup.css">					
		<!-- Style CSS -->						
		<link rel="stylesheet" href="{{asset('')}}web-assets/css/style-two.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>@media(max-width: 400px) {
		     .home_btn a {
			margin-right: 10px;
			padding: 10px;
			margin-left: 104px;
			height: 51px;
			width: 143px;
			text-align: center;
		}
		}
.navbar-brand img {
    width: 275px;
    height: auto;
    margin-top: 18px;
}
	 </style>

	</head>
	 
    <body data-spy="scroll" data-offset="80">
	
		<!-- particles -->
        <div id="particles-js"></div>	
	

        <!-- START NAVBAR -->
        <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky">
    		<div class="container">
			    <a class="navbar-brand" href=""><img src="{{asset('')}}upnl/images/tronfx.png" alt=""></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
			    </button><!--end button-->
			    <div class="collapse navbar-collapse" id="navbarCollapse">
			        <ul id="navbar-navlist" class="navbar-nav ms-auto">
			            <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
			            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
					    <li class="nav-item"><a class="nav-link" href="#feature">Features</a></li>						
			            <li class="nav-item"><a class="nav-link" href="#faq">faq</a></li>
			            <li class="nav-item"><a class="nav-link" target="_blank" href="">Plan</a></li>
			            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
			            <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registration</a></li>
			        </ul><!--END NAVBAR NAV-->
			    </div><!--END COLLAPSE-->
		    </div><!-- END CONTAINER -->
		</nav>
		<!-- END NAVBAR --> 	
		<!-- START HOME -->
		<section id="home" class="home_bg">
			<div class="container">
				<div class="row">
				  <div class="col-lg-6 col-sm-12 col-xs-12">
					<div class="hero-text">
						 <h2>Turn Your Dreams Into Realty With  OCEAN USDT</h2>
						 <p> OCEAN USDT is 100% decentralized digital platform that is based
                            on blockchain technology and secured by cryptography.</p>
						    <div class="home_btn">
							<a href="{{route('login')}}" class="btn_two">Login</a>
							  </div>
					
							
					</div> 
				  </div><!--- END COL -->
				  <div class="col-lg-6 col-sm-12 col-xs-12 text-center">
					<div class="buy-icons">
						<img src="{{asset('')}}web-assets/img/tron-fx-robot.png" class="img-fluid tm-ethereum">
					
					</div>
				  </div><!--- END COL -->			  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END  HOME -->
		
		<!-- START ABOUT -->
		<section class="about_us section-padding">
		   <div class="container">			
				<div class="section-title text-center">
					<h1>Powering the  OCEAN USDT network</h1>
					<p>The  OCEAN USDT token serves three distinct purposes:
        governance over the network, staking and bonding.</p>
				</div>				
				<div class="row">					
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single_about">
							<img src="{{asset('')}}web-assets/img/icon/secure.png" alt="image" />
							<h3>Governance</h3>
							<p> OCEAN USDT token holders have complete control over the protocol. All privileges, which on other platforms are exclusive to miners, will be given to the Relay Chain participants (DOT holders), including managing exceptional events such as protocol upgrades and fixes.</p>
						</div>
					</div><!-- END COL -->			
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single_about">
							<img src="{{asset('')}}web-assets/img/icon/insurance.png" alt="image" />
							<h3>Staking</h3>
							<p>Game theory incentivizes token holders to behave in honest ways. Good actors are rewarded by this mechanism whilst bad actors will lose their stake in the network. This ensures the network stays secure.</p>
						</div>
					</div><!-- END COL -->			
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single_about">
							<img src="{{asset('')}}web-assets/img/icon/industry.png" alt="image" />
							<h3>Bonding</h3>
							<p>New parachains are added by bonding tokens. Outdated or non-useful parachains are removed by removing bonded tokens. This is a form of proof of stake.</p>
						</div>
					</div><!-- END COL -->							
				</div><!-- END ROW -->
			</div><!-- END CONTAINER -->
		</section>
		<!-- END ABOUT -->		

		<!-- START ABOUT US CONTENT -->
		<section id="about" class="about_area section-padding">
			<div class="container">			
				<div class="row">
				  <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
					<div class="about-img">
						<img src="{{asset('')}}web-assets/img/580b57fbd9996e24bc43be10.png" class="img-fluid tm-ethereum" alt="about-image" />
					</div>
				  </div><!--- END COL -->				  
				  <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" >
					<div class="about-text">
						 <h2>About  OCEAN USDT</h2>
						 
						 <p>OCEAN USDT is a self-executing smart contract on the blockchain, it's a network marketing business with a unique strategy.
                        <br>
                        A blockchain is a decentralized, distributed and public digital ledger that is used to record transactions across many computers so that the record cannot be altered retroactively without the alteration of all subsequent blocks and the consensus of the network.<br>
                        We have developed a state-of-the-art marketplace where you can securely and reliably buy and sell any items. The fastest and most flexible asset platform in existence. It will include easy cryptocurrency payments integration, and even a digital arbitration system.


</p>
					</div>
				  </div><!--- END COL -->				  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END ABOUT US CONTENT -->


		<!-- START BUY SELL -->
		<section class="buy_sell_area section-padding" id="feature">
			<div class="container">					
				<div class="section-title text-center">
					<h1>Here We are presenting Our Features </h1>
				</div>					
				<div class="row">
				  <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
					<div class="buy_sell_list">
						<img src="{{asset('')}}web-assets/img/icon/bank.png" alt="image" />
						<h4 style="color: #ffff!important">True interoperability</h4>
						<p> OCEAN USDT enables cross-blockchain transfers of any type of data or asset, not just tokens. Connecting to  OCEAN USDT gives you the ability to interoperate with a wide variety of blockchains.</p>
					</div>
					<div class="buy_sell_list">
						<img src="{{asset('')}}web-assets/img/icon/wallet.png" alt="image" />
						<h4 style="color: #ffff!important">Economic scalability</h4>
						<p> OCEAN USDT provides unprecedented economic scalability by enabling a common set of validators to secure multiple blockchains.  OCEAN USDT provides transactional scalability by spreading transactions.</p>
					</div>
				  </div><!--- END COL -->	
				  <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
					<div class="portfolio_list_img">
						<img src="{{asset('')}}web-assets/img/logo-tronfx.png" class="img-fluid tm-ethereum" alt="" / style="margin-top: 90px">
					</div>
				  </div><!--- END COL -->	
				  <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
					<div class="buy_sell_list">
						<img src="{{asset('')}}web-assets/img/icon/personal%20detail%20icons1%20(1).png" alt="image" />
						<h4 style="color: #ffff!important">creater of OCEAN USDT </h4>
						<h6>Software engineer</h6>
						<p>Mr. Praneet ray </p>
						 	<p style="margin-left:80px;">From USA</p>
						 	 <br>
						 	  <br>
						 	   <br>
						 	   <br>
						  
					</div>
					<div class="buy_sell_list">
						<img src="{{asset('')}}web-assets/img/icon/secure.png" alt="image" />
						<h4 style="color: #ffff!important">
Security</h4>
						<p> OCEAN USDT novel data availability and validity scheme allows chains to interact with each other in a meaningful way. Chains remain independent in their governance, but united in their security.</p>
					</div>
				  </div><!--- END COL -->				  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END BUY SELL -->			
		 

				

		<!-- START HOW TO BUY -->
		<section class="how_to_buy_area section-padding" style="display:block;">
		   <div class="container">			
				<div class="section-title text-center">
					<h1>Get Started in a Few Minutes</h1>
				</div>				
				<div class="row text-center">					
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single_how_to_buy">
							<img src="{{asset('')}}web-assets/img/icon/man.png" alt="image" />
							<h4>Create Account</h4>
							<p>First of all sign up by the link, Fill your details and create account.</p>
						</div>
					</div><!-- END COL -->			
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single_how_to_buy">
							<img src="{{asset('')}}web-assets/img/icon/bank2.png" alt="image" />
							<h4>Link Your Crypto Wallet</h4>
							<p>After create your account link the account with the process.</p>
						</div>
					</div><!-- END COL -->			
					<div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
						<div class="single_how_to_buy">
							<img src="{{asset('')}}web-assets/img/icon/buy.png" alt="image" />
							<h4>Start Earning </h4>
							<p>After complete all things start your trading.</p>
						</div>
					</div><!-- END COL -->							
				</div><!-- END ROW -->
			</div><!-- END CONTAINER -->
		</section>
		<!-- END HOW TO BUY  -->
	

		<!-- START FAQ -->
		<section id="faq" class="faq1-area section-padding">
			<div class="container">
				<div class="section-title text-center">
					<h1>Frequently Asked Questions</h1>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-7 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="accordion" id="accordionExample">
						  <div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
							  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								What is  OCEAN USDT?
							  </button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
								 OCEAN USDT relay chain is built with Substrate, a blockchain-building framework that is the distillation of Parity Technologies’ learnings building Ethereum, Bitcoin, and enterprise blockchains.

                         OCEAN USDT state machine is compiled to WebAssembly (Wasm), a super performant virtual environment. Wasm is developed by major companies, including Google, Apple, Microsoft, and Mozilla, that have created a large ecosystem of support for the standard.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									What does “Decentralized” mean?
							  </button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
					
                        It is a system in which there are no admins,no MD - CMD there is no single server or system monitoring, project management.
                        Decentralized marketing is created with an automated contract that offers
                        you maximum security and sustainability. A smart contract is an automatic
                        execution algorithm. Its exists within the “BUSD BLOCKCHAIN”, the number
                        one cryptographic currency among those with which smart contracts ca be
                        created* the blockchain is an immutable record of transactions and
                        information, which is cryptographically.
                        SMART CONTRACT
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="headingThree">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								What is SMART CONTRACT ?
							  </button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
								This is a new phenomenon of the
                                modern decentralized economy allows,
                                in accordance with the program code,
                                process and distribute financial flows of
                                digital assets.
                                All processes take place in an open,
                                decentralized blockchain network
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="headingFour">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						What Is Blockchain Technology?
							  </button>
							</h2>
							<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
							Blockchain, sometimes referred to as distributed ledger technology (DLT), makes the history of any digital asset unalterable and transparent through the use of decentralization and cryptographic hashing.

                A simple analogy for how blockchain technology operates can be compared to how a Google Docs document works. When you create a Google Doc and share it with a group of people, the document is simply distributed instead of copied or transferred. This creates a decentralized distribution chain that gives everyone access to the base document at the same time.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="headingFour">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					What is cryptocurrency?
							  </button>
							</h2>
							<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
						Cryptocurrency is a digital payment system that doesn't rely on banks to verify transactions. It’s a peer-to-peer system that can enable anyone anywhere to send and receive payments. Instead of being physical money carried around and exchanged in the real world, cryptocurrency payments exist purely as digital entries to an online database describing specific transactions. When you transfer cryptocurrency funds, the transactions are recorded in a public ledger. Cryptocurrency is stored in digital wallets.
							  </div>
							</div>
						  </div>
						</div>						
					</div><!-- END COL  -->
					<div class="col-lg-5 col-sm-12 col-xs-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="faq-img">
							<img src="{{asset('')}}upnl/images/tronfx.png" class="img-fluid" alt="faq image" />
						</div>
					</div><!-- END COL  -->
				</div><!--END  ROW  -->
			</div><!-- END CONTAINER  -->
		</section>
		<!-- END FAQ -->
		
		<!-- START FOOTER -->
		<div class="footer">
			<div class="container">		
				<div class="row text-center">						
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<div class="footer_menu">
							<img src="{{asset('')}}upnl/images/tronfx.png" id="img_footer">
<!--<p> OCEAN USDT takes a different approach by letting blockchains pool their security, which means that the blockchains' security is aggregated and applied to all.-->

<!--By connecting to  OCEAN USDT, blockchain developers can secure their blockchain from day one.</p>-->
						</div>						
						<div class="footer_copyright">
							<p>&copy; 2025 OCEAN USDT |  All Rights Reserved.</p>
						</div>	
						<div class="footer_profile">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-telegram"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<!--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
							</ul>
						</div>						
					</div><!--- END COL -->							
				</div><!--- END ROW -->					
			</div><!--- END CONTAINER -->
		</div>
		<!-- END FOOTER -->		

		<!-- Latest jQuery -->
			<script src="{{asset('')}}web-assets/js/jquery-1.12.4.min.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
			<script src="{{asset('')}}web-assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- modernizer JS -->		
			<script src="{{asset('')}}web-assets/js/modernizr-2.8.3.min.js"></script>																		
		<!-- owl-carousel min js  -->
			<script src="{{asset('')}}web-assets/owlcarousel/js/owl.carousel.min.js"></script>				
		<!-- magnific-popup js -->               
			<script src="{{asset('')}}web-assets/js/jquery.magnific-popup.min.js"></script>			
		<!-- jquery counterup -->
			<script src="{{asset('')}}web-assets/js/jquery.counterup.min.js"></script>	
			<script src="{{asset('')}}web-assets/js/countdown.js"></script>		
		<!-- particles -->
			<script src="{{asset('')}}web-assets/js/particles.min.js"></script>
			<script src="{{asset('')}}web-assets/js/app.js"></script>			
		<!-- WOW - Reveal Animations When You Scroll -->
			<script src="{{asset('')}}web-assets/js/wow.min.js"></script>			
		<!-- scrolltopcontrol js -->																				
			<script src="{{asset('')}}web-assets/js/scrolltopcontrol.js"></script>																				
		<!-- scripts js -->
			<script src="{{asset('')}}web-assets/js/scripts.js"></script>		
    </body>



</html>