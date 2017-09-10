<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>

				<?php if($wr_options['header-search-box'] == 'no') {?>
				<!-- Empty -->
				<?php } else { ?> 
			
                <div class="searh-holder">
                    <div class="searh-inner">
                        <form id="searchfrom" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                            <input name="s" type="text" class="search" placeholder="Search.." />
                            <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                        </form>
                    </div>
                </div>	
				
				<?php } ;?>