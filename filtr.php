<?
	function go_filter(){
			
		 $args = array(); 
		 $args['meta_query'] = array('relation' => 'AND'); 
		 global $wp_query; 
		 if(!empty($_GET['size'])): 
		 
			$args['meta_query'][] = array( 
				'key' => 'tovarsize', 
				'value' => $_GET['size'], 
				'compare' => 'LIKE'
			);
									
		 endif; 
		 if(!empty($_GET['material'])): 
			
				$args['meta_query'][] = array( 
					'key' => 'tovarmaterial', 
					'value' => $_GET['material'], 
					'compare' => 'LIKE'
				);
				
		 endif; 
	  	 if(!empty($_GET['cat'])): 
			
				$args['meta_query'][] = array( 
					'key' => 'tovarcat', 
					'value' => $_GET['cat'], 
					'compare' => 'LIKE'
				);
				
		 endif;
		 if(!empty($_GET['country'])): 
			
				$args['meta_query'][] = array( 
					'key' => 'tovarcountry', 
					'value' => $_GET['country'], 
				  	'compare' => 'LIKE'
				);								
			
		 endif; 
		 if(!empty($_GET['season'])): 
			
				$args['meta_query'][] = array( 
					'key' => 'tovarseason', 
					'value' => $_GET['season'],
				  	'compare' => 'LIKE'
				);								
			
		 endif; 
		 if(!empty($_GET['price_s']) && !empty($_GET['price_s'])): 
			
				if(empty($_GET['price_s'])){$_GET['price_s'] = 0;}
				if(empty($_GET['price_f'])){$_GET['price_f'] = 9999999;}
				$args['meta_query'][] = array( 
					'key' => 'tovarprice', 
					'value' => array( (int)$_GET['price_s'], (int)$_GET['price_f'] ),
					'type' => 'numeric', 
					'compare' => 'BETWEEN' 
				);								
			
		 endif; 
		  
		query_posts(array_merge($args,$wp_query->query));
	}
?>
<? go_filter(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>