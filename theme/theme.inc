<?php

/**
 * @file
 * Any hooks/functions used by this modules theme's.
 */

use Drupal\Core\Url;

/**
 * Implements template_preprocess_HOOK().
 */
function template_preprocess_islandora_pdfjs(array &$variables) {
  $fedora_object = $variables['fedora_object'];
  $dsid = (isset($variables['dsid']) ? $variables['dsid'] : NULL);

  if ($dsid) {
    $file_url = Url::fromRoute(
      'islandora.view_datastream',
      ['object' => $fedora_object->id, 'datastream' => $dsid],
      ['absolute' => TRUE]
    )->toString();

    $variables['file_url'] = $file_url;
    $lib_path = libraries_get_path('pdfjs');
    $variables['viewer_url'] = Url::fromUri(
      file_create_url("$lib_path/web/viewer.html"), [
        'external' => TRUE,
        'query' => [
          'file' => $file_url,
        ],
      ]
    )->toString();

  }
}
