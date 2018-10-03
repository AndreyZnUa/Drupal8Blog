<?php

namespace Drupal\blog_hero\Annotation;


use Drupal\Component\Annotation\Plugin;

/**
 * BlogHeroEntity annotation
 *
 * @Annotation
 */
class BlogHeroEntity extends Plugin{

  /**
   * The plugin ID
   *
   * @var string
   */
  public $id;

  /**
   * The plugin status.
   *
   * By default all plugin are enabled and this value set in TRUE. You can set
   * it to FALSE, to temporary disable plugin
   *
   * @var bool
   */
  public $enabled;

  /**
   * The entity type ID.
   *
   * @var string
   */
  public $entity_type;

  /**
   * The entity bundle.
   *
   * An array of bundles form entity_type on which pages this plugin will be
   * available. Supports for wildcard (*) to match all entity type bundles.
   *
   * E.g. {"news", "page"}
   *
   * @var array
   */
  public $entity_bundle;

  /**
   * The weith of plugin
   *
   * Plugin with higher with, will be used.
   *
   * @var int
   */
  public $weight;
}