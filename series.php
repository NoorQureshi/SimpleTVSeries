<?php include 'header.php'; ?>

<div class="container">
	<div class="row ptop mtop">
		<div class="col-lg-12 text-center">
			<!-- player start -->
			<div id="player-mask">
				<div id="player" class="mauto">
					<div class="player-wrap">
						<img class="fit" src="<?php echo $title->backdrop_link;?>" alt="<?php echo $title->name;?>">
						<div class="watermark"><div class="host"><?php echo str_replace('www.','',parse_url($curpage, PHP_URL_HOST));?></div></div>
						<a class="inline play cboxElement" href="#login" onclick="return loaded;"></a>
						<div id="controls">
							<div class="control-wrap">
								<a class="inline cboxElement" href="#login" onclick="return loaded;"><div class="cplay"></div></a>
								<div class="cvolu">
									<div class="cvol"></div>
									<div id="ivol" class="text-left"></div>
								</div>
								<div class="ctime">
									<span class="cmin" title="0">00:00:00</span> / <span class="cmax"><?php if ($title->episode_run_time[0]):$rtime = $title->episode_run_time[0]*60; echo gmdate("H:i:s", $rtime); else: echo '00:43:06'; endif;?></span>
								</div>
								<div class="cfull"></div>
								<a class="inline cboxElement" href="#login" onclick="return loaded;"><div class="cset"><span class="chade"></span></div></a>
								<div class="cprog"></div>
							</div>
						</div>
						<div id="loader" style="display: none;"></div>
					</div>
				</div>
			</div>
			<!-- player end -->
		</div>
	</div>
	<hr />
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2 class="nomargin"><?php echo $title->name;?></h2>
		</div>
	</div>
</div>

<!-- movie detail start -->
<div class="container">
	<div class="row mtop mbottom small">
		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
			<img class="img-thumbnail fit" alt="<?php echo $title->name;?>" src="<?php echo $title->poster_link;?>" />
		</div>
		<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<?php if($title->first_air_date):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>First Air Date</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->first_air_date;?>
					</div>
				<?php endif;?>
				<?php if($title->last_air_date):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Last Air Date</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->last_air_date;?>
					</div>
				<?php endif;?>
				<?php if($title->number_of_seasons):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Number of Seasons</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->number_of_seasons;?>
					</div>
				<?php endif;?>
				<?php if($title->number_of_episodes):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Number of Episodes</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->number_of_episodes;?>
					</div>
				<?php endif;?>
				<?php if($title->status):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Status</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->status;?>
					</div>
				<?php endif;?>
				<?php if($title->gnr):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Genres</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->gnr;?>
					</div>
				<?php endif;?>
				<?php if($title->overview):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Storyline</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo nl2br($title->overview);?>
					</div>
				<?php endif;?>
				<?php if($title->cst):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Casts</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<?php echo $title->cst;?>
					</div>
				<?php endif;?>
				<?php if($title->seasons):?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
						<strong>Seasons</strong><span class="text-right fright">:</span>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 nopaddingleft">
						<ul class="fa-ul nomarginleft">
							<?php foreach($title->seasons as $season):?>
								<?php if($season->season_number!=0):?>
									<li>
										<i class="fa fa-play-circle-o mright5"></i> <a title="<?php echo $title->name;?> Season <?php echo $season->season_number;?>" href="<?php echo $season->link;?>"><?php echo $title->name;?> Season <?php echo $season->season_number;?></a><?php if(!empty($season->adate)):?> - <?php echo $season->adate;?><?php endif;?><?php if(!empty($season->episode_count)):?> - <?php echo $season->episode_count;?> Episodes<?php endif;?>
									</li>
								<?php endif;?>
							<?php endforeach;?>
						</ul>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<!-- movie detail end -->

<!-- login start -->
<div style="display:none;">
    <div id="login">
        <div class="login-header">Login or Register</div>
            <div class="login-notif">You should be logged in to use this feature</div>
			<div class="login-wrap">
				<div class="login">
					<div id="login-form">
						<div class="form-title">Member Login</div>
						<input type="text" id="userid" placeholder="username">
						<input type="password" id="password" placeholder="password">
						<div class="form-status">
							<span class="onload" style="display: none;">Please wait...</span>
							<span class="onerror" style="display: none;">Wrong Username or Password</span>
						</div>
						<input class="btn btn-info" type="submit" id="submit" value="Log me in">
					</div>
					<div class="noaccount">
						<div class="form-title">Don't have account?</div>
						<div class="noaccount-wrap small">Spend a little time now for free register and you could benefit later. You will be able to Stream and Download "<?php echo $title->name;?>" in High-Definition on PC (desktop, laptop, tablet, handheld pc etc.) and Mac. Download as many as you like and watch them on your computer, your tablet, TV or mobile device.</div>
						<div class="reg-wrap"><a class="btn btn-block btn-info" href="<?php echo $title->adcenter_link;?>">Register FREE Account</a></div>
					</div>
				</div>
				<div class="register">
					<div class="form-title">Member Benefits</div>
					<ul class="small">
						<li>Watch as many TV Series you want!</li>
						<li>Secure and no restrictions!</li>
						<li>Thousands of TV Series to choose from - Hottest new releases.</li>
						<li>Click it and Watch it! - no waiting to download TV Series, its instant!</li>
						<li>Stream TV Series in HD quality!</li>
						<li>Guaranteed to save time and money - Its quick and hassle free, forget going to the post office.</li>
						<li>It works on your TV, PC or MAC!</li>
					</ul>
                                <div class="reg-wrap"><a class="btn btn-block btn-info" href="<?php echo $title->adcenter_link;?>">Register FREE Account</a></div>
                </div>
                <div class="clear-float"></div>
        </div>
    </div>
</div>
<!-- login end -->

<?php include 'footer.php'; ?>