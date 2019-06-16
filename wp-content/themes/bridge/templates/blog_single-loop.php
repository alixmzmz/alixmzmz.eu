<?php
global $qode_options_proya;

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_proya['title_image'];
}
$title_image_height = "";
$title_image_width = "";
if(!empty($title_image)){
	$title_image_url_obj = parse_url($title_image);
  if (file_exists($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']))
		list($title_image_width, $title_image_height, $title_image_type, $title_image_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']);
}

$_post_format = get_post_format(); ?>


</div>
</div>
</div>
<div class="container">
	<div class="container_inner">
		<div class="blog_holder blog_single">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text">
						<div class="post_text_inner">

						<div class="wpb_row section vc_row-fluid grid_section">
							<div class=" section_inner clearfix">
								<h2>
									<span class="date"><?php the_time('F Y'); ?></span>
									<div class="green"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></div>
								</h2>
							</div>
						</div>

<?php
	switch ($_post_format) {
		case "video":
					$_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>

					<?php the_content(); ?>

					<?php if($_video_type == "youtube") { ?>
							<div class='embed-container'>
								<iframe src='http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>' frameborder='0' allowfullscreen></iframe>
							</div>
					<?php } elseif ($_video_type == "vimeo"){ ?>
							<div class='embed-container'>
								<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
					<?php } elseif ($_video_type == "self"){ ?>
						<div class="video">
						<div class="mobile-video-image" style="background-image: url(<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>);"></div>
						<div class="video-wrap"  >
							<video class="video" poster="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" preload="auto">
								<?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo get_post_meta(get_the_ID(), "video_format_webm", true);  ?>"> <?php } ?>
								<?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>"> <?php } ?>
								<?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo get_post_meta(get_the_ID(), "video_format_ogv", true);  ?>"> <?php } ?>
								<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
									<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
									<param name="flashvars" value="controls=true&file=<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>" />
									<img src="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
								</object>
							</video>
						</div></div>
					<?php } ?>
<?php
		break;
		case "audio":
?>
			<audio class="blog_audio" src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
				<?php _e("Your browser don't support audio player","qode"); ?>
			</audio>
			<?php the_content(); ?>

<?php
		break;
		case "link":
?>
			<?php $title_link = get_post_meta(get_the_ID(), "title_link", true) != '' ? get_post_meta(get_the_ID(), "title_link", true) : 'javascript: void(0)'; ?>
			<div class="post_title">
				<p><a href="<?php echo $title_link; ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			</div>
			<?php the_content(); ?>
<?php
		break;
		case "gallery":
?>
		<?php echo do_shortcode($filtered_content); ?>
<?php
		break;
		case "quote":
?>
			<i class="qoute_mark fa fa-quote-right pull-left"></i>
			<div class="post_title">
				<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
				<p><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></p>
				<span class="quote_author">&mdash; <?php the_title(); ?></span>
			</div>
			<?php the_content(); ?>
<?php
		break;
		default: ?>
						<?php the_content(); ?>
<?php } ?>
					</div>
				</div>
			</div>			
	</article>