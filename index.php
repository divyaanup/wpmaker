<?php include('filepart/header.php');?>
<!-- Start Banner Section -->

<?php /*?><div class="banner">
	<div class="container-fluid">
    	<div class="row-fluid main_banner_slide">
        	<div class="span12">
            	<div id="myCarousel" class="carousel slide">                
            <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item withbg01"><p>&nbsp;</p></div>
                        <div class="item withbg">
                        	<p><span>No need to pay more for HTML5/CSS3 anymore!!! </span><br> HTML5/CSS3 free <br> in all orders</p>
                        </div>
                        <div class="item withbg">
                        	<p><span>No need to ask for responsive anymore!!!</span><br> responsive included as<br>default in all orders</p>
                        </div>
                      </div>
                    <a class="carousel-control left" data-slide="prev" href="#myCarousel"><i class="icon-angle-left"></i></a>
                    <a class="carousel-control right" data-slide="next" href="#myCarousel"><i class="icon-angle-right"></i></a>
                    </div>
               	</div>
            </div>
        <div class="row-fluid">
        	<div class="span6">
                <a class="price" href="order.php">
                   <img src="img/img1.png" alt="Convert To Wordpress">
                 </a>
            </div>
            <div class="span6">
                <a class="hire" href="html-order.php">
                    <img src="img/img2.png" alt="PSD to Responsive HTML5">
                 </a>
            </div>
        </div>
    </div>
</div><?php */?>
<div class="container-fluid">
	<div class="mid_banner">
        <div class="row-fluid">
        	<?php echo stripslashes($comm->get_cms_part('get_start'));?>
        </div>
    </div>
    <div class="content_area" id="home_page_scroll">
    	<div class="row-fluid">
        	<div class="span12">
            	<h2>Got a Website Already?</h2>
                <p>No problem! We'll take your existing design and update it to modern-day web standards (HTML5, CSS3, Responsive, and more.)</p>
            </div>
        </div>
        
    	<div class="row-fluid tags_mainalign">
        	<div class="span3">
            	<div class="tags_icon"><i class="icon-group"></i></div>
            	<div class="tags_heading">500+</div>
            	<div class="tags_headingsmall">Happy Clients</div>
            </div>
        	<div class="span3">
            	<div class="tags_icon"><i class="icon-thumbs-up"></i></div>
            	<div class="tags_heading">100+</div>
            	<div class="tags_headingsmall">Dedicated Staffs</div>
            </div>
        	<div class="span3">
            	<div class="tags_icon"><i class="icon-trophy"></i></div>
            	<div class="tags_heading">1000+</div>
            	<div class="tags_headingsmall">Completed Projects</div>
            </div>
        	<div class="span3">
            	<div class="tags_icon"><i class="icon-globe"></i></div>
            	<div class="tags_heading">25+</div>
            	<div class="tags_headingsmall">Countries Served</div>
            </div>
        </div>
        
        <div class="row-fluid">
        	<div class="span3 text-box">
            	<h4><i class="icon-star"></i> Risk-Free</h4>
                <p>We back our work entirely. If you'd like us to sign a NDA to protect your privacy, we're happy to do so.</p>
            </div>
            <div class="span3 text-box">
            	<h4><i class="icon-ticket"></i> Speedy Delivery</h4>
                <p>We some of the fastest in the industry. We'll beat your deadlines and provide the highest quality product available.</p>
            </div>
            <div class="span3 text-box">
            	<h4><i class="icon-rocket"></i> Killer Support</h4>
                <p>We're here to help. We offer 24 hour email and Skype communication to our clients.</p>
            </div>
            <div class="span3 text-box">
            	<h4> <i class="icon-spinner"></i> Pixel Perfect</h4>
                <p>We don't take shortcuts. Our staff is constantly being updated with the latest web standards. Your project will be perfect, down to the last pixel, guaranteed.</p>
            </div>
        </div>
        <div class="latest_work">
    		<h3><span>Latest Work</span></h3>
        	<div class="row-fluid">
			<?php 
                $res = $db->selectQuery("SELECT * FROM `portfolio` WHERE `portfolio_status` = 'Y' ORDER BY `portfolio_id` DESC LIMIT 0,3");
                for($i=0;$i<count($res);$i++)
                {
            ?>
                <div class="span4">
                	<div class="view">
                        <a href="<?php echo stripslashes($res[$i]['portfolio_link']);?>" title="<?php echo stripslashes($res[$i]['portfolio_title']);?>"><img src="uploads/portfolio/<?php echo $res[$i]['portfolio_img'];?>" alt="<?php echo stripslashes($res[$i]['portfolio_title']);?>">
                        <div class="view_mask">
                            <i class="icon-link"></i>	
                        </div></a>
                    </div>
                </div>
			<?php
                }
                unset($res);
            ?>
        	</div>
     	</div>
            <div class="client_says">
            
        <div class="latest_work">
    		<h3><span>Latest Testimonials</span></h3>
         </div>
            
			<?php 
                $res = $db->selectQuery("SELECT * FROM `testimonials` WHERE `testimonial_status` = 'Y' AND `testimonial_video` = '' ORDER BY `testimonial_id` DESC LIMIT 0,2");
				$column=0;
                for($i=0;$i<count($res);$i++)
                {
					if($column==0)
					{
						?>
                <div class="row-fluid">
                        <?php
					}
            ?>
                    <div class="span6 client_comment">
                        <div class="span4">
                            <b><img src="uploads/testimonial/text_img/<?php echo stripslashes($res[$i]['testimonial_text_img']);?>" alt="Client Image"></b>
                         </div>
                        <div class="span8">
                            <p><?php echo stripslashes($res[$i]['testimonial_text']);?></p>
                            <h4><i class="icon-quote-left icon-3x pull-left icon-muted"></i><?php echo stripslashes($res[$i]['testimonial_name']);?><br/><span> <?php echo stripslashes($res[$i]['testimonial_job']);?></span></h4>
                        </div>
                    </div>
			<?php
					if($column==1 || $i==count($res)-1)
					{
						?>
                </div>
                        <?php
						$column=0;
					}
					else
					{
						$column++;
					}
                }
                unset($res);
            ?>
            </div>
    </div>
</div>
<script type="text/javascript">
dk_tab_selction('#top-menu-home');
</script>
<!-- End content Section -->
<?php include('filepart/footer.php');?>
