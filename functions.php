<?php
// Adding Stylesheet both parent and child theme

function load_theme_stylesheet()
{
    wp_enqueue_style('twentynineteen', get_template_directory_uri() . '/style.css');
    // wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');

    wp_enqueue_style('twentynineteen-Child', get_stylesheet_directory_uri() . '/style.css', array('twentynineteen'));
}
add_action('wp_enqueue_scripts', 'load_theme_stylesheet');
//Habilitar modo oscuro del editor
add_theme_support('editor-styles');
add_theme_support('dark-editor-style');
add_image_size('blog-grande', 600, 300, true); // Hard Crop Mode

//Función para poner el aviso de copyright y desde el año que funciona la web
function crear_aviso_copyright()
{
    $todos_posts = get_posts('post_status=publish&order=ASC');
    $primer_post = $todos_posts[0];
    $primer_post_fecha = $primer_post->post_date_gmt;
    _e('Copyright &copy; ');
    if (substr($primer_post_fecha, 0, 4) == date('Y')) {
        echo date('Y');
    } else {
        echo substr($primer_post_fecha, 0, 4) . "-" . date('Y');
    }
    echo ' <strong>' . get_bloginfo('name') . '</strong> ';
    _e('Todos los derechos reservados.');
}

//Para añadir campos extras al perfil del usuario
function wp_campos_extra($contactmethods)
{
    // Añadimos Twitter
    $contactmethods['twitter'] = 'Twitter';
    // Añadimos Facebook
    $contactmethods['facebook'] = 'Facebook';

    return $contactmethods;
}
add_filter('user_contactmethods', 'wp_campos_extra', 10, 1);

//Añade imágenes destacadas en el feed RSS
function rss_post_thumbnail($content)
{
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) .
            '</p>' . get_the_content();
    }
    return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');
