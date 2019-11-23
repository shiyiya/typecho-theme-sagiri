<?php

class Sagiri
{
  private static $instance = NULL;
  private $themeOptions = NULL;

  private static function init()
  {
    self::$instance = new Sagiri();
    self::$instance->themeOptions = Typecho_Widget::widget('Widget_Options');
  }

  public static function instance()
  {
    if (self::$instance == NULL) {
      self::init();
    }
    return self::$instance;
  }
}
