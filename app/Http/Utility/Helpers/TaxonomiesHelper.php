<?php

namespace AM\App\Http\Utility\Helpers;

class TaxonomiesHelper
{
    static public function processTaxonomies(array $terms, int $id, string $taxonomy) : void
    {
        $attachedTerms = [];

        foreach ($terms as $term) {
            $termExist = term_exists($term, $taxonomy);

            if (!$termExist) {
                $termInfo = wp_insert_term($term, $taxonomy);
                if (!is_wp_error($termInfo)) {
                    $attachedTerms[] = $term;
                }
            } else {
                $attachedTerms[] = $term;
            }
        }

        if (!empty($attachedTerms)) {
            wp_set_object_terms($id, $attachedTerms, $taxonomy);
        }
    }
}