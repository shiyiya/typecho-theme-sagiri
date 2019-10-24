<? if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Update
{

  static $version;

  public static function getVersion()
  {
    $pkg = json_decode(file_get_contents(__DIR__ . '/../package.json'), true);
    self::$version = +$pkg['version'];

    echo "<style>.theme-info{ text-align:center; margin:1em 0; } .theme-info > *{ margin:0 0 1rem } .buttons a{ background:#467b96; color:#fff; border-radius:4px; padding:.5em .75em; display:inline-block }</style>"
      . "<div class='theme-info'> "
      . "<h2>" . $pkg['name'] . "</h2>"
      . "<p>" . $pkg['description'] . "</p>"
      . "<p>By: <a href='https://github.com/shiyiya/typecho-theme-sagiri'>Shiyiya</a></p>"
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
        const uper = setInterval(() => {
          if (typeof $ === 'undefined') return

          if (hasCheck === true) {
            clearInterval(uper)
            return
          }

          console.log('--- checking update from github. ---')

          hasCheck = true
          $.ajax({
            type: 'GET',
            url: 'https://raw.githubusercontent.com/shiyiya/typecho-theme-sagiri/master/package.json',
            dataType: 'json',
            success: function(data) {
              if (data.version > " . self::$version . ") {
                $('.up').html('Found new version, <a href=\"https: //github.com/shiyiya/typecho-theme-sagiri target=\"_blank\" \"> ' + data.version + ' => click to download</a>')
              }
              console.log('[succeed]: ...')
            },
            error: function(err) {
              console.log('[failed]: ...')
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

?>



<!-- <script>
  var hasCheck = false
  const uper = setInterval(() => {
    if (typeof $ === 'undefined') return

    if (hasCheck === true) {
      clearInterval(uper)
      return
    }

    console.log('--- checking update from github. ---')

    hasCheck = true
    $.ajax({
      type: 'GET',
      url: 'https://raw.githubusercontent.com/shiyiya/typecho-theme-sagiri/master/package.json',
      dataType: 'json',
      success: function(data) {
        if (data.version > " . self::$version . ") {
          $('.up').html('Found new version, <a href=\"https: //github.com/shiyiya/typecho-theme-sagiri target=\"_blank\" \"> ' + data.version + ' => click to download</a>')
        }
        console.log('[succeed]: ...')
      },
      error: function(err) {
        console.log('[failed]: ...')
        $('.up').html('Unable to check for updates.')
      }
    })
  }, 500);
</script> -->