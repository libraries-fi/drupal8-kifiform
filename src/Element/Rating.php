<?php

namespace Drupal\kifiform\Element;

use Drupal\Core\Render\Element\FormElement;

/**
 * Interactive widget for content rating.
 *
 * @FormElement("kifiform_rating")
 */
class Rating extends FormElement {
  const VALUE_MAX = 100;
  const VALUE_MIN = 0;
  const STAR_COUNT = 5;

  public function getInfo() {
    $class = get_class($this);
    return [
      '#input' => TRUE,
      '#theme' => 'kifiform_rating',
      '#multiple' => FALSE,
      '#extended' => FALSE,
      '#pre_render' => [
        [$class, 'preRenderRating'],
      ],
      '#theme' => 'kifiform_rating',
    ];
  }

  public static function preRenderRating($element) {
    $element['#attached'] = ['library' => ['kifiform/rating']];
    return $element;
  }
}
