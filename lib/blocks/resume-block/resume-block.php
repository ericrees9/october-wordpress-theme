<?php

function resume_block_register() {
    wp_register_script(
        'resume-block-editor',
        get_template_directory_uri() . '/lib/blocks/resume-block/resume-block-editor.js',
        ['wp-blocks', 'wp-element', 'wp-editor'], // WordPress dependencies
        filemtime(get_template_directory() . '/lib/blocks/resume-block/resume-block-editor.js')
    );

    wp_register_style(
        'resume-block-style',
        get_template_directory_uri() . '/lib/blocks/resume-block/resume-block.css',
        [],
        filemtime(get_template_directory() . '/lib/blocks/resume-block/resume-block.css')
    );

    wp_register_style(
        'resume-block-editor-style',
        get_template_directory_uri() . '/lib/blocks/resume-block/resume-block-editor.css',
        [],
        filemtime(get_template_directory() . '/lib/blocks/resume-block/resume-block-editor.css')
    );

    register_block_type('october/resume-block', [
        'editor_script' => 'resume-block-editor',
        'style'         => 'resume-block-style',
        'editor_style'  => 'resume-block-editor-style',
        'render_callback' => 'resume_block_render'
    ]);
}
add_action('init', 'resume_block_register');

function resume_block_render($attributes) {
    $content = isset($attributes['content']) ? esc_html($attributes['content']) : 'Default content';
    return '<div class="my-custom-block">' . $content . '</div>';
}
