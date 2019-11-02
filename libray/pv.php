<? if (!defined('__TYPECHO_ROOT_DIR__')) exit;

#### Plan A -- Typecho custom field. ####
function getPostView($widget)
{
  $fields = $widget->fields;
  $views = 0;

  if (empty($fields->views)) {
    $widget->setField('views', 'int', '0', $widget->cid);
  } else {
    $views =  $fields->views;
  }


  if ($widget->is('single')) {
    $vieweds = Typecho_Cookie::get('extend_contents_views');
    empty($vieweds) ? $vieweds = array() : $vieweds = explode(',', $vieweds);

    if (!in_array($widget->cid, $vieweds)) {
      $widget->incrIntField('views', '1', $widget->cid);
      $vieweds[] = $widget->cid;
      $vieweds = implode(',', $vieweds);
      Typecho_Cookie::set("extend_contents_views", $vieweds);
    }
  }
  echo $views;
}



#### Plan B -- Will destroy the original structure of the Typecho database. ####

## BackUp
/*
```sql
-- postview(mysql)
ALTER TABLE `typecho_contents` ADD `views` INT(10) NULL DEFAULT '0' AFTER `parent`;

-- siteview(mysql)
```
*/
/*
function getPostView($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views);
        }
    }
    echo $row['views'];
}
*/
