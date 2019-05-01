<?php

namespace Drupal\islandora_pdfjs\Commands;

use Drupal\islandora\Commands\AbstractPluginAcquisition;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class IslandoraPdfjsCommands extends AbstractPluginAcquisition {

  /**
   * {@inheritdoc}
   */
  protected function getDownloadUri() {
    return 'https://github.com/mozilla/pdf.js/releases/download/v1.10.88/pdfjs-1.10.88-dist.zip';
  }

  /**
   * {@inheritdoc}
   */
  protected function getInstallDir($path) {
    return implode('/', [
      $path,
      'pdfjs',
    ]);
  }

  /**
   * {@inheritdoc}
   */
  protected function getDescriptor() {
    return 'PDF.js plugin';
  }

  /**
   * Download and install the plugin.
   *
   * @param string $path
   *   Optional. A path where to install the plugin. If omitted Drush
   *   will use the default location.
   *
   * @command islandora_pdfjs:plugin
   * @aliases pdfjsplugin,pdfjs-plugin
   */
  public function installPlugin($path = NULL) {
    return $this->plugin($path);
  }

}
