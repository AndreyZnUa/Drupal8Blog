<?php

namespace Drupal\blog_paragraphs\Plugin\paragraphs\Behavior;


use Drupal\Component\Utility\Html;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\paragraphs\Annotation\ParagraphsBehavior;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\paragraphs\ParagraphInterface;
use Drupal\paragraphs\ParagraphsBehaviorBase;

/**
 * @ParagraphsBehavior(
 *   id="blog_paragraphs_remote_video",
 *   label=@Translation("Remote video settings"),
 *   description=@Translation("Additional settings for remote video paragraph."),
 *   weight=0,
 * )
 */
class RemoteVideoBehavior extends ParagraphsBehaviorBase {

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(ParagraphsType $paragraphs_type) {
    return $paragraphs_type->id() == 'remote_video';
  }

  /**
   * {@inheritdoc}
   */
  public function view(array &$build, Paragraph $paragraph, EntityViewDisplayInterface $display, $view_mode) {
    $maximum_video_width = $paragraph->getBehaviorSetting($this->getPluginId(), 'video_width', 'full');
    $bem_block = 'paragraph-' . $paragraph->bundle() . ($view_mode == 'default' ? '' : '-' . $view_mode);

    $build['#attributes']['class'][] = Html::getClass($bem_block . '--video-width-' . $maximum_video_width);
    //dump($build);
  }

  /**
   * {@inheritdoc}
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {

    /**
     * Настройка влияющая на размер видео
     */
    $form['video_width'] = [
      '#type' => 'select',
      '#title' => $this->t('Video width'),
      '#description' => $this->t('Maximum width for video'),
      '#options' => [
        'full' => '100%',
        '720p' => '720p',
      ],
      '#default' => $paragraph->getBehaviorSetting($this->getPluginId(), 'video_width', 'full'),
    ];

    return $form;
  }

}