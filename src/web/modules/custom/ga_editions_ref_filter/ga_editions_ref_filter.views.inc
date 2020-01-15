<?php
/**
 * Implements hook_views_data_alter().
 */
function ga_editions_ref_filter_views_data_alter(array &$data) {
    $data['node_field_data']['related_content_titles'] = array(
        'title' => t('Related editions'),
        'filter' => array(
            'title' => t('Related editions'),
            'help' => t('Specify a list of titles a content node can have.'),
            'field' => 'nid',
            'id' => 'ga_editions_ref_filter_related_content_titles'
        ),
    );
}
