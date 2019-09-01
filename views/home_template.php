<section class="container-fluid">
	<div class="pb-3 pt-1">
		<div id="carouselExample" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExample" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExample" data-slide-to="1"></li>
				<li data-target="#carouselExample" data-slide-to="2"></li>
				<li data-target="#carouselExample" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner carousel-home">
				<div class="carousel-item active">
					<img src="../images/708.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>First slide label</h5>
						<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="../images/wave.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Second slide label</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="../images/stone.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Third slide label</h5>
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="../images/wc.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Forth slide label</h5>
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div class="container pt-3 pb-3">
		<div class="row col-md-8">
			<h2 class="">Auction Item</h2>
			<p><a class="btn btn-sm btn-outline-info ml-5 mt-2" href="item">View All Items</a></p>
		</div>
		
		<div class="card-deck border-top">
			<?php
				$i = 0;
				foreach ($items as $item) {
					$i++;
					?>
					<div class="col-md-4"> 
						<div class="card mt-3 m-0">
							<?php 
								if (file_exists('../images/items/' . $item['image_name'])) {
									echo '<a href="../images/items/'.$item['image_name'].'"><img  class="card-img-top" src="../images/items/' . $item['image_name'].'" /></a>';
								}
							?>
							<div class="card-body">
								<p class="mb-0 text-muted"><b><?php echo 'Item title: '.$item['item_name']; ?></b></p>
								<p class="mb-0 text-muted"><b><?php echo 'Start Price:  &#0163;'.$item['price']; ?></b></p>
								<p class="mb-1 text-muted"><b><?php echo 'Auction Date: '.$item['auction_date']; ?></b></p>
								<p class="text-muted" style="height: 50px;"><?php echo substr($item['description'], 0, 50).' ...'; ?></p>
								<p class="text-center"><?php echo '<a class="btn btn-success btn-sm " href="view_detail?vid='.$item['lot_number'].'">Show Detail</a>'; ?> </p>
							</div>
						</div>
					</div>
				<?php
				if ($i == 6) { break; }
			} ?>
		</div>
	</div>

	<div class="container pt-3 pb-3">
		<div class="row col-md-8">
			<h2 class="">Events</h2>
			<p><a class="btn btn-sm btn-outline-info ml-5 mt-2" href="event">View All Events</a></p>
		</div>
		
		<div class="card-deck border-top">
			<?php
				$i = 0;
				foreach ($events as $event) {
					$i++;
					?>
					<div class="col-md-4"> 
						<div class="card mt-3 m-0">
							<?php 
								if (file_exists('../images/items/' . $event['image_name'])) {
									echo '<a href="../images/items/'.$event['image_name'].'"><img  class="card-img-top" src="../images/items/' . $event['image_name'].'" /></a>';
								}
							?>
							<div class="card-body">
								<p class="mb-0 text-muted"><?php echo '<b>Item title: </b>'.$event['event_name']; ?></p>
								<p class="mb-0 text-muted"><?php echo '<b>Lot Number: </b>'.$event['lot_number']; ?></p>
								<p class="mb-1 text-muted"><?php echo '<b>Event Location: </b>'.$event['event_location']; ?></p>
								<p class="mb-1 text-muted"><?php
									if ($event['to_date'] != '0000-00-00') {
										echo '<b>Starts From: </b>'.$event['from_date'].' <b>To </b>'.$event['to_date']; 
									}
									else
										echo '<b>Starts From: </b>'.$event['from_date']; 
								?></p>
								<p class="mb-1 text-muted"><?php echo '<b>Starting time: </b>'.$event['event_time']; ?></p>
							</div>
						</div>
					</div>
				<?php
				if ($i == 3) { break; }
			} ?>
		</div>
	</div>

	<div class="container pt-2 pb-5 pl-0 pr-0">
		<div class="col-sm-12">
			<h2>What <b>our customers</b> are saying</h2><hr>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators carousel-testimonial">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>   
				<div class="carousel-inner">
					<div class="item carousel-item active">
						<div class="row">
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/1.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
											<p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/2.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
											<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<div class="item carousel-item">
						<div class="row">
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/3.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
											<p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/4.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
											<p class="overview"><b>Mary Saveley</b>, Web Designer</p>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<div class="item carousel-item">
						<div class="row">
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/5.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
											<p class="overview"><b>Martin Sommer</b>, UX Analyst</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="#">
											<img src="../images/6.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
											<p class="overview"><b>John Williams</b>, Web Developer</p>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
</section>