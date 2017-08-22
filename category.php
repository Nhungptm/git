<?php get_header(); ?>

<div id="topic_path">    
    	<ul class="clearfix">
            <li><a href="<?php bloginfo("url"); ?>/" id="btn_home"></a></li>
            <li class="next_path"><?php the_title(); ?></li>
        </ul>
    </div><!-- /topic_path -->


    <div id="content" class="mtp-20 clearfix">
    
    	<div id="main_column">
        
        	<h2 class="headline05">全てのお知らせ</h2>
            
            <?php if (have_posts()):while(have_posts()):the_post(); ?>
            
            <section class="topics_list">
            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="topics_excerpt"><?php the_excerpt(); ?></div>
                <div class="post_meta clearfix">
                    <p class="topics_date">掲載日：<?php the_time('Y.m.d'); ?></p>
                    <p class="topics_category">
                    カテゴリー：
					</p>
                </div> 
            </section><!-- /topics_list -->
            <?php endwhile; endif; 	?>
            
            <div class="pager clearfix">
				<?php global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }
                else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');;
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 4,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '«',
                    'next_text' => '»',
                )); ?>
            </div><!-- /pager -->
            
		</div><!-- /main_column -->

<?php get_sidebar(); ?>


<?php get_footer(); ?>