<?php

/**
 * @file
 * Contains \Drupal\entity_browser\DisplayInterface.
 */

namespace Drupal\entity_browser;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines the interface for entity browser displays.
 */
interface DisplayInterface extends PluginInspectionInterface, ConfigurablePluginInterface {

  /**
   * Returns the display label.
   *
   * @return string
   *   The display label.
   */
  public function label();

  /**
   * Displays entity browser.
   *
   * This is the "entry point" for every non-entity browser code to interact
   * with it. It will take care about displaying entity browser in one way or
   * another.
   *
   * @param array $current_selection
   *   Currently selected entities.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function displayEntityBrowser();

  /**
   * Indicates completed selection.
   *
   * Entity browser will call this function when selection is done. Display
   * plugin is responsible for fetching selected entities and sending them to
   * the initiating code.
   *
   * @param \Drupal\Core\Entity\EntityInterface[] $entities
   *
   */
  public function selectionCompleted(array $entities);

  /**
   * Set current selection.
   *
   * @param array $current_selection
   *   An array of entity ids.
   *
   * @return $this
   */
  public function setCurrentSelection(array $current_selection);

  /**
   * Get current selection.
   *
   * @return array
   *   An array of entity ids.
   */
  public function getCurrentSelection();
}
