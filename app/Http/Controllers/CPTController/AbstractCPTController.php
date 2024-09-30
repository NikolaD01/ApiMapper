<?php

namespace AM\App\Http\Controllers\CPTController;

abstract class AbstractCPTController
{
    protected string $post_type;
    protected array $post_type_args = array();

    public function __construct($post_type, $args = array()) {
        $this->post_type = $post_type;
        $this->post_type_args = $args;

        add_action('init', array($this, 'register_post_type'));
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_meta_box_data'));
    }

    public function register_post_type() : void
    {
        $defaults = array(
            'public'    => true,
            'supports'  => array('title'),
            'show_in_rest' => true,
        );
        $args = wp_parse_args($this->post_type_args, $defaults);
        register_post_type($this->post_type, $args);
    }

    abstract public function add_meta_boxes();
    abstract public function save_meta_box_data($post_id);
}