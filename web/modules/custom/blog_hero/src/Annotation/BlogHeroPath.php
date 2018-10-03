<?php

namespace Drupal\blog_hero\Annotation;


use Drupal\Component\Annotation\Plugin;

/**
 * BlogHeroEntity annotation
 *
 * @Annotation
 */
class BlogHeroPath extends Plugin{

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
   * The paths to match
   *
   * An array with paths to limit with plugin execution. Can contain wildcard (*)
   * and Drupal placeholders such as <front>
   *
   * @var array
   */
  public $match_path;

  /**
   * The match type for match_path.
   *
   * Value can be:
   *  - listed: (default) Show only at paths from match_path
   *  - unlisted: Show at all paths, except those listed in match_path.
   *
   * @var string
   */
  public $match_type;

  /**
   * The weith of plugin
   *
   * Plugin with higher with, will be used.
   *
   * @var int
   */
  public $weight;
}