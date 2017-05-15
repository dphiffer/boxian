<?php

function fwc_library_nav_tags() {
  $tags = get_terms( array(
    'taxonomy' => 'post_tag',
    'hide_empty' => true,
    'exclude' => '1'
  ));

  $censorship = get_terms( array(
    'taxonomy' => 'censorship_status',
    'hide_empty' => true,
  ));

  $translation = get_terms( array(
    'taxonomy' => 'translation_status',
    'hide_empty' => true,
  ));

  $search_language = get_terms( array(
    'taxonomy' => 'search_language',
    'hide_empty' => true,
  ));

  $search_engine = get_terms( array(
    'taxonomy' => 'search_engine',
    'hide_empty' => true,
  ));

  $tag_sets = array(
    $censorship,
    $translation,
    $search_language,
    $search_engine,
    $tags,
  );

  foreach($tag_sets as $tag_set) {
    foreach ($tag_set as $term) {
      echo "<a href=\"".get_term_link($term->term_id)."\" class=\"post-tag\">$term->name</a>";
    }
    if (count($tag_set)) {
      echo "</br>";
    }
  }
}