<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 *  REF -> https://www.ihewro.com/
 */

class I18n
{
  private static $instance;

  private $path = 'lang'; // langs path
  private $defaultLang = "zh_CN";
  public $lang; // mathed lang
  private $loadedLangs = array();
  private $loaded = false;

  function __construct()
  {
    $this->loadLangs();
  }

  public static function Instance()
  {
    if (self::$instance == null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public static function translate($string)
  {
    $instance = self::Instance();
    $instance->loadLangs();

    if (@array_key_exists($string, $instance->loadedLangs)) {
      $translated = $instance->loadedLangs[$string];
    } else {
      return $string;
    }
    return $translated;
  }

  private function loadLangs()
  {
    if (!$this->loaded && empty(Typecho_Widget::widget('Widget_Options')->lang)) {
      if (empty($this->lang)) {
        $this->lang = $this->matchLangs();
      }
      $this->loadedLangs = array();

      if ($this->lang == $this->defaultLang) {
        $this->loaded = true;
        return;
      }

      $path = $this->path;
      $lang = $this->lang;

      $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $lang . ".php";

      if (file_exists($file)) {
        $className = str_replace('/', '_', $path) . '_' . $lang;

        if (!class_exists($className)) {
          require_once($file);
        }

        if (class_exists($className)) {
          $lang = new $className();
        } else {
          $lang = null;
        }

        if (method_exists($lang, "translated")) {
          $translated = $lang->translated();
          if (is_array($translated)) {
            $this->loadedLangs = array_merge($this->loadedLangs, $translated);
          }
        }

        if (method_exists($lang, "dateFormat")) {
          $format = $lang->dateFormat();
          if (empty($format) && empty($this->dateFormat)) {
            $format = mget()->postDateFormat;
          }
          $this->dateFormat = $format;
        }
      }

      $this->loaded = true;
    }
  }

  private function matchLangs()
  {
    $resultLocale = "en";
    $accepts = mb_split(',', @$_SERVER['HTTP_ACCEPT_LANGUAGE']);

    $userLangs = array();
    foreach ($accepts as $lang) {
      $q = " 1.0 ";
      if (preg_match('/^([a-zA-Z0-9\-\_]+);q=([0-9\.]+)$/i', $lang, $matched)) {
        $q = $matched[2];
        $userLangs[$q] = $matched[1];
      } elseif (preg_match('/^([a-zA-Z0-9\-\_]+)$/i', $lang, $matched)) {
        $userLangs[$q] = $lang;
      } else {
        continue;
      }

      $locale = str_replace('-', '_', $userLangs[$q]);
      $parts = mb_split('_', $locale, 2);
      if (count($parts) == 2) {
        $locale = strtolower($parts[0]) . '_' . strtoupper($parts[1]);
      }

      $userLangs[$q] = $locale;
    }

    if (count($userLangs) > 1) {
      $keys = array_keys($userLangs);
      rsort($keys, SORT_NUMERIC);

      if ($userLangs[$keys[0]] == $this->defaultLang) {
        return $this->defaultLang;
      }

      $localLangs = $this->findLocalLangs($this->path);

      foreach ($keys as $key) {
        $userLang = $userLangs[$key];
        if (in_array($userLang, $localLangs)) {
          $resultLocale = $userLang;
          break;
        } else {
          $parts = mb_split('_', $userLang, 2);
          if (in_array($parts[0], $localLangs)) {
            $resultLocale = $parts[0];
            break;
          }
        }
      }
    } else {
      $resultLocale = array_shift($userLangs);
    }

    return $resultLocale;
  }

  private function findLocalLangs($path)
  {
    $dir = dirname(__FILE__) . "/$path";
    $dir = str_replace('\\', DIRECTORY_SEPARATOR,  $dir);

    if (!file_exists($dir)) return array();

    $it  = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST
    );
    $it->setMaxDepth(1);

    $langs = array();
    foreach ($it as $fileInfo) {
      if ($fileInfo->isFile()) {
        $filename = $fileInfo->getFilename();
        $filename = str_replace('.php', '', $filename);
        $langs[] = $filename;
      }
    }
    return $langs;
  }
}


function i18n($string)
{
  echo I18n::translate($string);
}

function _i18n($string)
{
  return I18n::translate($string);
}

function i18nLang()
{
  $lang = I18n::Instance()->lang;
  $htmlLang = mb_split('_', $lang, 2)[0];
  echo  $htmlLang;
}
