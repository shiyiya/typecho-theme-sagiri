<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function getFieldByName($name, $limit = 5)
{
  $db = Typecho_Db::get();

  $fields = $db->fetchAll(
    $db->select()->from('table.fields')
      ->where('name = ?', $name)
      ->order('int_value', Typecho_Db::SORT_DESC)
      ->limit($limit)
  );
  return  $fields;
}


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

function getTopView()
{
  $db = Typecho_Db::get();

  $viewsFields = getFieldByName('views');

  $cids = [];
  $cidsMap = [];
  foreach ($viewsFields as $val) {
    array_push($cids, $val['cid']);
    $cidsMap[$val['cid']] =  $val['int_value'];
  }

  $cid = implode(',', $cids);
  $days = 99999999;
  $time = time() - (24 * 60 * 60 * $days);

  $query = $db->select()->from('table.contents')
    . ' where cid in (' . $cid . ')'
    . ' and created >= ' . $time
    . ' and created <= ' . time()
    . ' and type = "post" and status = "publish"'
    . ' order by instr("' . $cid . '", cid)';

  $result =  $db->fetchAll($query);

  echo '<ul class="top-view-archive list">';
  foreach ($result as $val) {
    $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
    $post_title = htmlspecialchars($val['title']);
    $permalink = $val['permalink'];
    echo '<li><a href="' . $permalink . '" title="' . $cidsMap[$val['cid']] . 'viewed">' . $post_title . '</a></li>';
  }
  echo '</ul>';
}

function siteViewer()
{
  $viewsFields = getFieldByName('views', 9999999999);
  $count = 0;

  foreach ($viewsFields as $val) {
    $count += $val['int_value'];
  }
  return $count;
}


#### Plan B -- Will destroy the original structure of the Typecho database. ####

## BackUp
/*
```sql
-- postview(mysql)
ALTER TABLE `typecho_contents` ADD `views` INT(10) NULL DEFAULT '0' AFTER `parent`;
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

function getTopView($limit = 5)
{
    $days = 99999999999999;
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('created >= ?', $time)
        ->where('type = ?', 'post')
        ->where('status = ?', 'publish')
        ->where('created <= ?', time())
        ->limit($limit)
        ->order('views', Typecho_Db::SORT_DESC));
    if ($result) {
        echo '<ul class="top-view-archive list">';
        foreach ($result as $val) {
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="' . $permalink . '" title="' . $val['views'] . '人看过">' . $post_title . '</a></li>';
        }
        echo '</ul>';
    }
}

function siteViewer()
{
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $pom = $db->fetchAll("SELECT SUM(VIEWS) FROM `" . $prefix . "contents` WHERE `type`='page' or `type`='post'");
        $num = number_format($pom[0]['SUM(VIEWS)'], 0, '', '');
        return $num;
    } else {
        return 0;
    }
}
*/
