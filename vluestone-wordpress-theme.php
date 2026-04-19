# Estrutura do Tema WordPress Vluestone
vluestone-theme/
├── style.css
├── screenshot.png
├── index.php
├── header.php
├── footer.php
├── functions.php
├── page.php
├── single.php
└── assets/
    ├── css/
    ├── js/
    └── images/

# style.css
/*
Theme Name: Vluestone
Author: Erik-Masck
Description: Tema WordPress convertido do template original
Version: 1.0
Text Domain: vluestone
*/

@import url('assets/css/style.css');
@import url('assets/css/responsive.css');

# functions.php
<?php
function vluestone_setup() {
    // Suporte a títulos de página
    add_theme_support('title-tag');
    
    // Suporte a imagens destacadas
    add_theme_support('post-thumbnails');
    
    // Registrar menus
    register_nav_menus(array(
        'primary-menu' => __('Menu Principal', 'vluestone'),
        'footer-menu' => __('Menu Rodapé', 'vluestone')
    ));
}
add_action('after_setup_theme', 'vluestone_setup');

function vluestone_scripts() {
    // Carregar estilos
    wp_enqueue_style('vluestone-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('vluestone-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css');
    
    // Carregar scripts
    wp_enqueue_script('vluestone-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'vluestone_scripts');

# header.php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header>
        <div class="logo">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h1><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
        </div>
        
        <nav>
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'main-menu',
                'container'      => false,
            )); 
            ?>
        </nav>
    </header>

# footer.php
    <footer>
        <div class="footer-content">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class'     => 'footer-menu',
                'container'      => false,
            )); 
            ?>
            
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Todos os direitos reservados.', 'vluestone'); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

# index.php
<?php get_header(); ?>

<main class="main-content">
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
                
                <footer>
                    <a href="<?php the_permalink(); ?>" class="read-more">
                        <?php _e('Leia mais', 'vluestone'); ?>
                    </a>
                </footer>
            </article>
            <?php
        endwhile;
        
        the_posts_pagination();
    else :
        ?>
        <p><?php _e('Nenhum conteúdo encontrado', 'vluestone'); ?></p>
        <?php
    endif;
    ?>
</main>

<?php get_footer(); ?>

# page.php
<?php get_header(); ?>

<main class="page-content">
    <?php 
    while (have_posts()) : the_post();
        ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile; 
    ?>
</main>

<?php get_footer(); ?>

# single.php
<?php get_header(); ?>

<main class="single-content">
    <?php 
    while (have_posts()) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span class="author"><?php the_author(); ?></span>
                    <span class="date"><?php the_date(); ?></span>
                </div>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
            <footer>
                <?php 
                the_tags('<div class="tags">', ', ', '</div>');
                the_post_navigation(); 
                ?>
            </footer>
        </article>
        <?php
    endwhile; 
    ?>
</main>

<?php get_footer(); ?>
