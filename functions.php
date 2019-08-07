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
    wp_enqueue_style(
        'hero',
        get_stylesheet_directory_uri() . '/css/style-hero.css',
        array(),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.css', array('twenty-nineteen-child-styles'), '1.5.1', 'all');
    // Scripts

    wp_enqueue_script('jquery');
    wp_enqueue_script('leafle-js', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.5.1/leaflet.js', array(), '1.5.1', true);
    wp_enqueue_script('mis-scripts', get_stylesheet_directory_uri() . '/js/mis-scripts.js', array(), '1.5.1', true);
}
function starter_setup()
{
    // Habilitar el modo oscuro para el editor
    add_theme_support('editor-styles');
    add_theme_support('dark-editor-style');

    add_theme_support('title-tag');
    add_image_size('blog-grande', 600, 300, true); // Hard Crop Mode
    add_image_size('medio', 470, 174, true);
}
add_action('after_setup_theme', 'starter_setup');

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
        'name' => 'Sidebar lateral',
        'id' => 'sidebar-2',
        'descripcion' => 'Sidebar lateral',
        'class' => 'side-bar',
        'before_widget' => '<ul id="%1$s" class="%2$s"><li id="%1$s" class="%2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h4 class="titulodelwidget">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'miplugin_register_sidebars');

// Habilita shortcodes en los widgets de texto (o no funcionaran. En el de Html no funcionan)
add_filter('widget_text', 'do_shortcode');
// Función que crea shortcode para mostrar últimas entradas con imágenes  
//Crear shortcode en Worpress para mostrar las últimas entradas
// Una vez creado el Shortcode, tenemos que añadir el código del mismo en la sección que queramos.
// [recientes  limite="3" longitud_titulo="50" longitud_desc="50" thumbnail="1" tamano="50" categoria="2"]
// Es bastante fácil de entender y de modificar:
// Límite: Muestra el número de entradas que le especifiquemos.
// Longitud_titulo, longitud_desc: Como su nombre indica, con esto controlamos la logitud del título y de la descripción.
// Thumbnail: Si es 1 mostraremos la imagen destacada. Si es 0, no la mostraremos.
// Tamano: Indicamos el tamaño de la imagen.
// Categoria: Especificamos la categoria de la cual mostraremos las últimas entradas.

add_shortcode('recientes', 'shortcode_recientes');
function shortcode_recientes($atts, $content = null, $code)
{

    extract(shortcode_atts(array(
        'limite' => 24,
        'longitud_titulo' => 50,
        'longitud_desc' => 80,
        'thumbnail' => true,
        'ancho' => '320',
        'alto' => '150',
        'categoria' => 1
    ), $atts));

    $query = array('cat' => $categoria, 'showposts' => $limite, 'orderby' => 'date', 'order' => 'DESC', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);

    $q = new WP_Query($query);
    if ($q->have_posts()) :
        $salida  = '';
        /* comienzo while */
        while ($q->have_posts()) : $q->the_post();
            $salida .= '<div class="services-grid">';
            // $salida .= '<hr>';
            if (has_post_thumbnail() && $thumbnail == true) :
                $salida .= '<div class="image">';
                $salida .= get_the_post_thumbnail(get_the_id(), array($ancho, $alto), array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'imageborder alignleft'));
                $salida .= '<div class="hoverimage"></div>';
                $salida .= '</div>';
            endif;
            $salida .= '<div class="posts_content">';
            $salida .= '<a href="' . get_permalink() . '" title="' . sprintf("Enlace permanente a %s", get_the_title()) . '">';
            $salida .= '<strong>';
            $salida .= wp_html_excerpt(get_the_title(), $longitud_titulo);
            $salida .= '</strong>';
            $salida .= '</a>';

            $excerpt = get_the_excerpt();
            $salida .= ($excerpt) ? '<p class="widget_resumen">' . wp_html_excerpt($excerpt, $longitud_desc) . '...</p>' : '';
            $salida .= '<hr class="fondo_news">';
            $salida .= '<br>';
            $salida .= '</div>';
            $salida .= '</div>';
        endwhile;
        wp_reset_query();
    /* fin while */

    endif;

    return $salida;
}
add_shortcode('recientes',    'shortcode_recientes');
