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
