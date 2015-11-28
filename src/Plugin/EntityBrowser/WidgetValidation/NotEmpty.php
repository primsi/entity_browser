<?php

/**
 * @file
 * Contains \Drupal\entity_browser\Plugin\EntityBrowser\WidgetValidation\NotNull.
 */

namespace Drupal\entity_browser\Plugin\EntityBrowser\WidgetValidation;

use Drupal\Core\TypedData\ListDataDefinition;
use Drupal\entity_browser\WidgetValidationBase;

/**
 * Validates that the widget is not empty.
 *
 * @EntityBrowserWidgetValidation(
 *   id = "not_empty",
 *   label = @Translation("Not empty validator"),
 *   constraint = "Count"
 * )
 */
class NotEmpty extends WidgetValidationBase {
  /**
   * {@inheritdoc}
   */
  public function validate(array $entities, $options = []) {
    $data_definition = ListDataDefinition::create('integer');
    $plugin_definition = $this->getPluginDefinition();
    $data_definition->addConstraint($plugin_definition['constraint'], $options);

    $typed_data = \Drupal::typedDataManager()->create($data_definition, $entities);
    return $typed_data->validate();
  }
}
