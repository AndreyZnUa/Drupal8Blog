<?php

namespace Drupal\blog\Plugin\BlogHero\Entity;


use Drupal\blog_hero\Annotation\BlogHeroEntity;
use Drupal\blog_hero\Plugin\BlogHero\Entity\BlogHeroEntityPluginBase;

/**
 * Hero block for blog_article node type.
 *
 * @BlogHeroEntity(
 *   id = "blog_node_blog_article",
 *   entity_type="node",
 *   entity_bundle={"blog_article"}
 * )
 */
class NodeBlogArticle extends BlogHeroEntityPluginBase {

  /**
   * {@inheridoc}
   */
  public function getHeroSubtitle() {
    /** @var \Drupal\node\NodeInterface $node */
    $node = $this->getEntity();
    return $node->get('body')->value;
  }

  /**
   * {@inheridoc}
   */
  public function getHeroImage() {
    /** @var \Drupal\node\NodeInterface $node */
    $node = $this->getEntity();
    /** @var \Drupal\media\MediaInterface $media */
    $media = $node->get('field_image')->entity;

    return $media->get('field_media_image')->entity->get('uri')->value;
  }

}