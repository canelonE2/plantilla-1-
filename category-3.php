  
<?php  get_header(); ?>

<section  id="seccion1">
<div class="container-fluid">
    <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias y blog 
<?php</h1>
<?php
            $args = array(
            'post_type'=> 'post',
            'category_name'  => 'blog',
            'orderby' => 'post_date',
            'posts_per_page'=>'4',
            'paged' => get_query_var('paged')
           );
            query_posts( $args ); 
            while (have_posts()) : the_post(); 

      global $post;
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
 ?>
    
 <div class="sinpadding panel"  id="post">
        <div class="row">    
            <div class="col-md-4" style="overflow:hidden;height: 300px;">
              <div style="height:250px;background: url('<?php echo $imgDestacada; ?>') center / cover; width:100%;
  height: 350px;">  
            </div>
            
        </div>  
          <div class="col-md-8"  style="height: 300px;">
              <div  class="imagen1">
                <h3><?php the_title() ?></h3>
                <p><?php echo substr(strip_tags($post->post_content), 0, 500); ?></p>
              </div>
              <div class="panel">
               <div class="panel panel-body">
             </div>  
              <a href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default center-block btn-lg">¡Leer mas!</button></a>
            
              
              </div>
        </div>
    </div>  
    </div>

       <?php endwhile; ?>

<?php // Wordpress Pagination
                $big = 999999999; // need an unlikely integer
                $links = paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'prev_text'    => '<',
                    'next_text'    => '>',
                    'type' => 'array'
                ) );
                if(!empty($links)){ ?>
    <div class="text-center" style=" text-align: center; width:100%">
                <ul class="pagination pagination-lg" >
                        <?php

                        foreach($links as $link){
                            ?>
                            <li><?php echo $link; ?></li>
                            <?php
                        }
                        wp_reset_query(); ?>
                    </ul>
    </div>
                    <?php } ?>
</div>    
</section>
<?php get_footer();   ?>