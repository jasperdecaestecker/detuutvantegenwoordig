<?php if(!defined('KIRBY')) exit ?>

title: Articles
pages: article
fields:
  title:
    label: Title
    type:  text
  intro:
    label: Text
    type:  textarea
    size:  large
  ArticlePerPage:
    label: Articles per page
    type: text 
    required: true