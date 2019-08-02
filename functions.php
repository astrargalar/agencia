<?php
// // Adding Stylesheet both parent and child theme

add_action('wp_enqueue_scripts', 'twenty_nineteen_child_theme_enqueue_styles');
function twenty_nineteen_child_theme_enqueue_styles()
{

    $parent_style = 'twenty-nineteen-parent-theme-styles'; // This is 'twentynineteen-parent-theme-styles' for the Twenty Nineteen theme.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'twenty-nineteen-child-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'twenty-nineteen-servicios',
        get_stylesheet_directory_uri() . '/css/servicios.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

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

// Cambiar [...] por el botón Leer más ... en los extractos de los post
function boton_excerpt_more($more)
{
    global $post;
    // return '… <a href="' . get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>'; Así pondría solo el texto Read mores, sin botón
    return $more . '<a href="' . esc_url(get_permalink()) . '" class="roll-button">' . esc_html__(' Leer más...', 'twentynineteen') . '</a>';
}
add_filter('excerpt_more', 'boton_excerpt_more');

//Poner permalink a las imagenes

add_filter('post_thumbnail_html', 'wps_post_thumbnail', 10, 3);
function wps_post_thumbnail($html, $post_id, $post_image_id)
{
    $html = '<span class="removed_link" title="' . get_permalink($post_id) . '">' . $html . '</span>';
    return $html;
}
function miplugin_register_sidebars()
{
    register_sidebar(array(
        "name" => "Sidebar lateral",
        "id" => "sidebar-2",
        "descripcion" => "Sidebar lateral",
        "class" => "side-lateral",
        "before_widget" => "<li id='%1$s' class='%2$s'>",
        "after_widget" => "</li>",
        "before_title" => "<h2 class='titulodelwidget'>",
        "after_title" => "</h2>"
    ));
}
add_action('widgets_init', 'miplugin_register_sidebars');
