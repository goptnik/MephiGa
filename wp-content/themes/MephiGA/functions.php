<?php

/**
* загрудаемые стили и скрипты
**/
function load_style_script(){
	wp_enqueue_script('jquery-1', get_template_directory_uri() . '/js/jquery-1.js');
	wp_enqueue_script('jquery00', get_template_directory_uri() . '/js/jquery00.js');
	wp_enqueue_script('init0000', get_template_directory_uri() . '/js/init0000.js');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

/**
* загружаем стили и скрипты
**/
add_action('wp_enqueue_scripts', 'load_style_script');

/**
* поддержка миниатюр
**/
add_theme_support('post-thumbnails');

/**
* меню
**/
register_nav_menu('menu', 'Меню');

/**
* сайдбар
**/
register_sidebar(array(
	'name' => 'Виджеты сайдбара',
	'id' => 'sidebar',
	'description' => 'Здесь размещайте виджеты сайдбара',
	'before_widget' => '<div class="vidget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
));

/**
* футер
**/
register_sidebar(array(
	'name' => 'Виджеты футера',
	'id' => 'footer',
	'description' => 'Здесь размещайте виджеты футера',
	'before_widget' => '<div class="menu-foot">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
));

/**
* комментарии
**/
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s в %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Ваш комментарий ожидает проверки', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Редактировать', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Ответить', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

/**
* слайдер
**/
add_action('init', 'slider');
function slider(){
	register_post_type('slider', array(
		'public' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => 'Слайдер',
			'all_items' => 'Все слайды',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавление слайда'
		)
	));
}

?>


<?php
function myform_action_callback() {
	global $wpdb;
	global $mail;
	$nonce=$_POST['nonce'];
	$rtr='';
if (!wp_verify_nonce( $nonce, 'myform_action-nonce'))wp_die('{"error":"Error. Spam"}');
	$message="";
	$to="goptnik@mail.ru"; 
	$headers = "Content-type: text/html; charset=utf-8 \r\n";
	$headers.= "From: wordpress@goptnik.beget.tech \r\n"; // заменить на другой ящик
	$subject="Сообщение с сайта ".$_SERVER['SERVER_NAME'];
	do_action('plugins_loaded');
	if (!empty($_POST['name']) && !empty($_POST['mess']) && !empty($_POST['email'])){
	$message.="Имя: ".$_POST['name'];
	$message.="<br/>E-mail: ".$_POST['email'];
	$message.="<br/>Сообщение:<br/>".nl2br($_POST['mess']);
if(wp_mail($to, $subject, $message, $headers)){
	$rtr='{"work":"Сообщение отправлено!","error":""}';
}else{
	$rtr='{"error":"Ошибка сервера."}';
}
}else{
	$rtr='{"error":"Все поля обязательны к заполнению!"}';
}
echo $rtr;
exit;
}
	add_action('wp_ajax_nopriv_myform_send_action', 'myform_action_callback');
	add_action('wp_ajax_myform_send_action', 'myform_action_callback');
	function myform_stylesheet(){
	wp_enqueue_style("myform_style_templ",get_bloginfo('stylesheet_directory')."style.css","0.1.2",true);
	wp_enqueue_script("myform_script_temp",get_bloginfo('stylesheet_directory')."/js/scriptform.js",array('jquery'),"0.1.2",true);
	wp_localize_script("myform_script_temp", "myform_Ajax", array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('myform_action-nonce') ) );
}
	add_action( 'wp_enqueue_scripts', 'myform_stylesheet' );
function MephiGa_contacts() {
	$rty='<div class="form">';
	$rty.='<div class="line"><input id="name" type="text" placeholder="Имя"/></div>';
	$rty.='<div class="line"><input id="email" type="text" placeholder="Почта"/></div>';
	$rty.='<div class="line"><textarea id="mess" placeholder="Сообщение"></textarea></div>';
	$rty.='<div class="line"><input type="submit" onclick="myform_ajax_send(\'#name\',\'#email\',\'#mess\'); return false;" value="Отправить"/></div>';
	$rty.='</div>';
return $rty;
}
add_shortcode( 'MephiGa_contacts', 'MephiGa_contacts' );
	?>