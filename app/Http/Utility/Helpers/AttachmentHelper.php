<?php

namespace AM\App\Http\Utility\Helpers;

class AttachmentHelper
{
    public static function deleteQueriedPostsAndFiles($query) : void
    {
        if ($query->have_posts()) {
            foreach ($query->posts as $post) {
                $post_id = $post->ID;
                $attachments = get_attached_media('', $post_id);

                foreach ($attachments as $attachment) {
                    $file_path = get_attached_file($attachment->ID);

                    wp_delete_attachment($attachment->ID, true);

                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                wp_delete_post($post_id, true);
            }
        }
    }

    public static function setThumbnail(string $image_url, int $post_id) : void
    {
        $response = wp_remote_get($image_url);
        if (is_wp_error($response)) {
            return;
        }

        $image_data = wp_remote_retrieve_body($response);
        if (!$image_data) {
            return;
        }
        $image_url = str_replace('%20', '_', $image_url);
        $filename = basename($image_url);
        $filename = str_replace(' ', '_', $filename);
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['path'] . '/' . $filename;

        file_put_contents($file_path, $image_data);

        $file_type = wp_check_filetype($filename, null);
        if (!$file_type['type']) {
            unlink($file_path);
            return;
        }

        $attachment = array(
            'post_mime_type' => $file_type['type'],
            'post_title'     => sanitize_file_name($filename),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );

        $attachment_id = wp_insert_attachment($attachment, $file_path, $post_id);

        if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($post_id, $attachment_id);
        } else {
            unlink($file_path);
        }
    }
}
