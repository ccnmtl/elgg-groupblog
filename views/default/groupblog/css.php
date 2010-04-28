<?php

	/**
	 * Elgg blog CSS extender
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>


.groupblog_post {
	margin-bottom: 15px;
	border-bottom: 1px solid #aaaaaa;
}

.groupblog_post_icon {
	float:left;
	margin:3px 0 0 0;
	padding:0;
}

.groupblog_post h3 {
	font-size: 150%;
	margin-bottom: 5px;
}

.groupblog_post h3 a {
	text-decoration: none;
}

.groupblog_post p {
	margin: 0 0 5px 0;
}

.groupblog_post .strapline {
	margin: 0 0 0 35px;
	padding:0;
	color: #aaa;
	line-height:1em;
}
.groupblog_post p.tags {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/icon_tag.gif) no-repeat scroll left 2px;
	margin:0 0 0 35px;
	padding:0pt 0pt 0pt 16px;
	min-height:22px;
}
.groupblog_post .options {
	margin:0;
	padding:0;
}

.groupblog_post_body img[align="left"] {
	margin: 10px 10px 10px 0;
	float:left;
}
.groupblog_post_body img[align="right"] {
	margin: 10px 0 10px 10px;
	float:right;
}
.groupblog_post_body img {
	margin: 10px !important;
}

.groupblog-comments h3 {
	font-size: 150%;
	margin-bottom: 10px;
}
.groupblog-comment {
	margin-top: 10px;
	margin-bottom:20px;
	border-bottom: 1px solid #aaaaaa;
}
.groupblog-comment img {
	float:left;
	margin: 0 10px 0 0;
}
.groupblog-comment-menu {
	margin:0;
}
.groupblog-comment-byline {
	background: #dddddd;
	height:22px;
	padding-top:3px;
	margin:0;
}
.groupblog-comment-text {
	margin:5px 0 5px 0;
}




