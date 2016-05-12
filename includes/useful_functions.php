<?php
/**
 * Created by PhpStorm.
 * User: TERRYB2123
 * Date: 10/12/2015
 * Time: 10:21 AM
 */

function selectMenu($list, $selected, $name){
  $menu = "<select name= $name>\n";
  foreach($list as $key => $value){
    $menu .= "\t<option value='$value' ";
    if ($selected == $value){
      $menu .= "selected";
    }
    $menu .=">$key</option>\n";
  }
  $menu .="\t</select>\n";
  return $menu;

}
  function minicalendar( $month, $year ){
  $calendar = "<table>";
  return $calendar;

  }

/**
 * @param $title
 * @param $author
 * @param $blog_content
 * @param $date_posted
 * @param $cache_buster
 * @param $blog_id
 * @return string
 */
function create_blog_html($title, $author, $blog_content, $date_posted, $cache_buster, $blog_id)
{
//language="HTML"
  $detail = <<<END_OF_DETAIL
<div class = 'detail', id='style'>
  <h2>$title</h2>
  Author: $author</br></br>
  Blog:</br> $blog_content</br></br>
  Date Posted: $date_posted</br></br>

<a href="/blog_list.php?$cache_buster">List All Blogs</a><br/>
<a href="/blog_edit.php?blog_id=$blog_id">Edit Blog</a><br/>
</div>
END_OF_DETAIL;
  return $detail;
}

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>