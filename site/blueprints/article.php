<?php if(!defined('KIRBY')) exit ?>

title: Article
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  articleDate:
    label: ArticleDate
    type: date 
  Imagelink:
    label: Image
    type: text 
  Author:
    label: Author
    type: user   