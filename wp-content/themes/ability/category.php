<?php get_header(); ?>

<!-- OPEN #archive -->
<section id="archive" class="section">

	<div class="section-heading clearfix">

		<div class="container">
		<div id="search-bar-cat">
		 	<form method="get" action="<?php bloginfo('url'); ?>">
				    <div><label class="screen-reader-text" for="s">Search</label>					
				    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />					
					<?php						
					    wp_dropdown_categories(array('show_option_all' => 'All categories'));						
					?>						
						    <input type="submit" id="searchsubmit" value="Go" />				
				    	</div>
				</form>
            </div>
			<div class="section-heading-content sixteen columns">
            
				<h1><?php single_cat_title(''); ?></h1>

                <div class="sub-heading">
					<span class="section-desc"> <?php echo category_description(); ?></span>
				</div>

<!--div class="filter-wrap">
<?php if (is_category()) {
  $this_category = get_category($cat);
  if (get_category_children($this_category->cat_ID) != "") {
    echo "<ul id='category-menu' class='clearfix'>";
    wp_list_categories('orderby=id&show_count=0&title_li=
&use_desc_for_title=1&child_of='.$this_category->cat_ID);
    echo "</ul>";
  }
} ?>
</div-->

			</div>
                          
		</div>
	</div>
     

	<div class="section-content container">
    
        <?php get_template_part( 'sidebar', 'category' ); ?>
        
		<!-- OPEN .blog-items -->
		<ul class="blog-items category-items">
		
			<?php if(have_posts()) : while(have_posts()) : the_post();
			   // The following determines what the post format is and shows the correct file accordingly
			   $format = get_post_format();
			   get_template_part( 'includes/post-type/'.$format );

			   if($format == '')
			   get_template_part( 'includes/post-type/standard' );
			endwhile; endif; ?>
		
		<!-- CLOSE . blog-items -->
		</ul>

	    <?php if ( has_previous_posts() || has_next_posts() ) { ?>
			
			<!-- OPEN .navigation .blog-navigation .clearfix -->
			<div class="navigation blog-navigation clearfix">
			<?php wp_pagenavi(); ?>
			
				<!--div class="nav-previous"><?php next_posts_link('<span>&larr;</span> Older Entries'); ?></div>
				<?php wp_link_pages(); ?>
				<div class="nav-next"><?php previous_posts_link('Newer Entries <span>&rarr;</span>'); ?></div-->		
				
			<!-- CLOSE .navigation .blog-navigation .clearfix -->
			</div>
			
		<?php } ?>
		
	</div>
    
<!-- CLOSE #archive -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>