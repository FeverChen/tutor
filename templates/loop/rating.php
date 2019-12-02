<?php
/**
 * A single course loop rating
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="tutor-loop-rating-wrap">
	<?php
	$course_rating = tutor_utils()->get_course_rating();
	tutor_utils()->star_rating_generator($course_rating->rating_avg);
	?>
    <span class="tutor-rating-count">
        <?php
        echo $course_rating->rating_avg;
        echo '<i>('.$course_rating->rating_count.')</i>';
        ?>
    </span>
</div>

