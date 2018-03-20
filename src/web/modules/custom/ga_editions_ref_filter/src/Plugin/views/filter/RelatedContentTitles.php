<?php
/**
 * @file
 * Definition of Drupal\ga_editions_ref_filter\Plugin\views\filter\RelatedContentTitles.
 */
namespace Drupal\ga_editions_ref_filter\Plugin\views\filter;
use Drupal\views\Plugin\views\display\DisplayPluginBase;
use Drupal\views\Plugin\views\filter\ManyToOne;
use Drupal\views\ViewExecutable;
/**
 * Filters by given list of related content title options.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("ga_editions_ref_filter_related_content_titles")
 */
class RelatedContentTitles extends ManyToOne {
    /**
     * {@inheritdoc}
     */
    public function init(ViewExecutable $view, DisplayPluginBase $display, array &$options = NULL) {
        parent::init($view, $display, $options);
        $this->valueTitle = t('Allowed related content titles');
        $this->definition['options callback'] = array($this, 'generateOptions');
    }

    /**
     * Helper function that generates the options.
     * @return array
     */
    public function generateOptions() {
        $storage = \Drupal::entityManager()->getStorage('node');
        $relatedContentQuery = \Drupal::entityQuery('node')
            ->condition('type', array('edition'), 'IN')
            ->condition('status', 1); //ensuring that the node is published
        $relatedContentIds = $relatedContentQuery->execute(); //returns an array of node ID's
        $res = array();
        foreach($relatedContentIds as $contentId){
            // building an array with nid as key and title as value
            $res[$contentId] = $storage->load($contentId)->getTitle();
        }
        return $res;
    }
}
