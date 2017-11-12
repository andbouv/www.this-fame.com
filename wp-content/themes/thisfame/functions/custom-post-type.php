<?
/*------------------------------------------------------------*\
	Custom Post Types
\*------------------------------------------------------------*/

// NOTE : REACTIVER LES PERMALIENS DEPUIS L'ADMIN WP POUR PRENDRE EN COMPTE LA NOUVELLE URL


function create_post_type() {
    register_post_type('artiste',
        array(
            'label'                 => __('Artistes'),
            'singular_label'        => __('Artiste'),
            'add_new_item'          => __( 'Ajouter un artiste' ),
            'edit_item'             => __( 'Modifier un artiste' ),
            'new_item'              => __( 'Nouveaau artiste' ),
            'view_item'             => __( 'Voir l\'artiste' ),
            'search_items'          => __( 'Rechercher un artiste' ),
            'not_found'             =>  __( 'Aucun artiste trouvé' ),
            'not_found_in_trash'    => __( 'Aucun artiste trouvé' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-groups',
            'taxonomies'            => array('galerie'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'artistes', 'with_front' => true)
        )
    );

    register_post_type('album',
        array(
            'label'                 => __('Albums'),
            'singular_label'        => __('Album'),
            'add_new_item'          => __( 'Ajouter un album' ),
            'edit_item'             => __( 'Modifier un album' ),
            'new_item'              => __( 'Nouveaau titre' ),
            'view_item'             => __( 'Voir l\'album' ),
            'search_items'          => __( 'Rechercher un titre' ),
            'not_found'             =>  __( 'Aucun titre trouvé' ),
            'not_found_in_trash'    => __( 'Aucun titre trouvé' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-album',
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'albums', 'with_front' => true)
        )
    );

    register_post_type('playlist',
        array(
            'label'                 => __('Playlists'),
            'singular_label'        => __('Playlist'),
            'add_new_item'          => __( 'Ajouter une playlist' ),
            'edit_item'             => __( 'Modifier une playlist' ),
            'new_item'              => __( 'Nouveaau titre' ),
            'view_item'             => __( 'Voir le titre' ),
            'search_items'          => __( 'Rechercher un titre' ),
            'not_found'             =>  __( 'Aucun titre trouvé' ),
            'not_found_in_trash'    => __( 'Aucun titre trouvé' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-format-audio',
            'taxonomies'            => array('galerie'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'playlists', 'with_front' => true)
        )
    );

    register_post_type('titre',
        array(
            'label'                 => __('Titres'),
            'singular_label'        => __('Titre'),
            'add_new_item'          => __( 'Ajouter un titre' ),
            'edit_item'             => __( 'Modifier un titre' ),
            'new_item'              => __( 'Nouveaau titre' ),
            'view_item'             => __( 'Voir le titre' ),
            'search_items'          => __( 'Rechercher un titre' ),
            'not_found'             =>  __( 'Aucun titre trouvé' ),
            'not_found_in_trash'    => __( 'Aucun titre trouvé' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-format-audio',
            'taxonomies'            => array('galerie'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'titres', 'with_front' => true)
        )
    );

    register_post_type('video',
        array(
            'label'                 => __('Vidéos'),
            'singular_label'        => __('Video'),
            'add_new_item'          => __( 'Ajouter une vidéo' ),
            'edit_item'             => __( 'Modifier une vidéo' ),
            'new_item'              => __( 'Nouvelle vidéo' ),
            'view_item'             => __( 'Voir la vidéo' ),
            'search_items'          => __( 'Rechercher une vidéo' ),
            'not_found'             =>  __( 'Aucune vidéo trouvée' ),
            'not_found_in_trash'    => __( 'Aucune vidéo trouvée' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-video-alt3',
            'taxonomies'            => array('galerie'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'videos', 'with_front' => true)
        )
    );

}
add_action( 'init', 'create_post_type' );

function themes_taxonomy() {
    register_taxonomy(
        'galerie',
        'medias',
        array(
            'hierarchical' => true,
            'label' => 'Galeries',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'galerie',
                'with_front' => false
            )
        )
    );

    register_taxonomy(
        'categories',
        'video',
        array(
            'hierarchical' => true,
            'label' => 'Catégories',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'categories',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'themes_taxonomy');
