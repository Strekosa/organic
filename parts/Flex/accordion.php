
<section class="accordion-section">
 <div class="grid-container">
     <?php if ( $field = get_sub_field( 'title' ) ): ?>
         <h4><?php echo $field; ?></h4>
     <?php endif; ?>
     <?php if ( have_rows( 'repeater_accordion' ) ): ?>
         <ul class="accordion-list">
             <?php while ( have_rows( 'repeater_accordion' ) ): the_row();

                 $title     = get_sub_field( 'title' );
                 $text      = get_sub_field( 'content' );
                 ?>
                 <li>
                     <div class="question">
                     <h5><?php echo $title; ?></h5>
                     </div>
                     <div class="answer">
                         <?php echo $text; ?>
                     </div>
                 </li>

             <?php endwhile; ?>
         </ul>
     <?php endif; ?>
 </div>
</section>


