<?php
/**
 * Implements hook_views_data_alter().
 */
function ga_partner_category_ref_filter_views_data_alter(array &$data) {
    $data['node_field_data']['related_partner_category'] = array(
        'title' => t('Related partner category'),
        'filter' => array(
            'title' => t('Related partner category'),
            'help' => t('Specify a list of titles a content node can have.'),
            'field' => 'nid',
            'id' => 'ga_partner_category_ref_filter_related_content_titles'
        ),
    );
}