<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: article
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
    size:  large
  Imagelink:
    label: Image
    type: text 
  Subtitle: 
  	label: Sub Title
  	type: text
  ArticlePerPage:
    label: Articles per page
    type: text 
    required: true