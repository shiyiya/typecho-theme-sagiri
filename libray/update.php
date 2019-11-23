<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Update
{

  static $version;

  public static function getLocalVersion()
  {
    $pkg = json_decode(file_get_contents(__DIR__ . '/../package.json'), true);
    return $pkg['version'];
  }

  public static function getVersion()
  {
    $pkg = json_decode(file_get_contents(__DIR__ . '/../package.json'), true);
    self::$version = $pkg['version'];


    echo "<style>.theme-info{ text-align:center; margin:1em 0; } .theme-info > *{ margin:0 0 1rem } .buttons a{ background:#467b96; color:#fff; border-radius:4px; padding:.5em .75em; display:inline-block }</style>"
      . "<div class='theme-info'> "
      . "<h2>" . $pkg['name'] . "</h2>"
      . "<p>" . $pkg['description'] . "</p>"
      . "<p>By: <a href='https://github.com/shiyiya/typecho-theme-sagiri' target='_blank'>Shiyiya</a> | <a href='https://github.com/shiyiya/typecho-theme-sagiri/issues' target='_blank'>建议&反馈</a></p>"
      . "Current Version: " . self::$version
      . "&nbsp; | &nbsp;"
      . "<span class='up'> It's the latest version. </span>"
      . "</div>";
  }

  public static function checkVersion()
  {
    echo
      "
    <script>
    var hasCheck = false
    var uper = setInterval(function() {
      if (typeof $ === 'undefined') return

      if (hasCheck === true) {
        clearInterval(uper)
        return
      }

      console.log('--- checking update from github. ---')

      $.ajax({
        type: 'GET',
        url: 'https://raw.githubusercontent.com/shiyiya/typecho-theme-sagiri/master/package.json',
        dataType: 'json',
        success: function(data) {
          var version = '" . self::$version . "'.split('.')
          data.version.split('.').forEach(function(c, i) {
            if (!!version[i] && +c > +version[i]) {
              console.log('[succeed]: ', 'Found new version', data.version)
              $('.up').html('Found new version, <a href=\"https: //github.com/shiyiya/typecho-theme-sagiri target=\"_blank\" \"> ' + data.version + ' => click to download</a>')
            }
            hasCheck = true
            console.log('[Status]: ', version, '------', data.version)
            return;
          })
        },
        error: function(err) {
          hasCheck = true
          console.log('[failed]: ', err)
          $('.up').html('Unable to check for updates.')
        }
      })
    }, 500);
</script>
      ";
  }

  public static function valid()
  {
    self::getVersion();
    self::checkVersion();
  }
}
