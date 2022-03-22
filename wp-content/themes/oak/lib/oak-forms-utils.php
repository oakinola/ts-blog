<?php

/**
 * Remove unwanted fields from comment form.
 */
function oak_remove_comment_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','oak_remove_comment_fields');

function is_valid_phone_number($phoneNumber) {
    if (empty($phoneNumber)) {
        return false;
    }

    if (strlen($phoneNumber) < 11) {
        return false;
    }

    return ctype_digit($phoneNumber);
}