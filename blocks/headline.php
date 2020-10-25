<?php

###############################################################################
##                Blockies - Block hacks/enhancements for XOOPS              ##
##                    Copyright (c) 2004 NS Tai (aka tuff)                   ##
##                       <http://www.brandycoke.com>                        ##
###############################################################################
##                    XOOPS - PHP Content Management System                  ##
##                       Copyright (c) 2000 XOOPS.org                        ##
##                          <http://xoops.codigolivre.org.br>                          ##
###############################################################################
##  This program is free software; you can redistribute it and/or modify     ##
##  it under the terms of the GNU General Public License as published by     ##
##  the Free Software Foundation; either version 2 of the License, or        ##
##  (at your option) any later version.                                      ##
##                                                                           ##
##  You may not change or alter any portion of this comment or credits       ##
##  of supporting developers from this source code or any supporting         ##
##  source code which is considered copyrighted (c) material of the          ##
##  original comment or credit authors.                                      ##
##                                                                           ##
##  This program is distributed in the hope that it will be useful,          ##
##  but WITHOUT ANY WARRANTY; without even the implied warranty of           ##
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            ##
##  GNU General Public License for more details.                             ##
##                                                                           ##
##  You should have received a copy of the GNU General Public License        ##
##  along with this program; if not, write to the Free Software              ##
##  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA ##
###############################################################################
##  Author of this file: NS Tai (aka tuff)                                   ##
##  URL: http://www.brandycoke.com/                                          ##
##  Project: Blockies                                                        ##
###############################################################################

function b_blockies_headline_show()
{
    global $xoopsModule, $xoopsUser, $xoopsConfig;

    if (!is_object($xoopsModule) || 'news' != $xoopsModule->getVar('dirname')) {
        $moduleHandler = xoops_getHandler('module');

        $mod_news = $moduleHandler->getByDirname('news');

        if (!$mod_news || !$mod_news->getVar('isactive')) {
            return false;
        }
    } else {
        $mod_news = $xoopsModule;
    }

    if (file_exists(XOOPS_ROOT_PATH . '/modules/news/language/' . $xoopsConfig['language'] . '/main.php')) {
        require_once XOOPS_ROOT_PATH . '/modules/news/language/' . $xoopsConfig['language'] . '/main.php';
    } else {
        require_once XOOPS_ROOT_PATH . '/modules/news/language/english/main.php';
    }

    require_once XOOPS_ROOT_PATH . '/modules/news/class/class.newsstory.php';

    if (!$news = NewsStory::getAllPublished(1)) {
        return false;
    }

    $headline = $news[0];

    $block = [];

    $block['storyid'] = $headline->storyid();

    $link = '<a href="' . XOOPS_URL . '/modules/news/article.php?storyid=' . $block['storyid'] . '">';

    $block['newstitle'] = $link . $headline->title() . '</a>';

    if ($block['poster'] = $headline->uname()) {
        $block['postedby'] = _POSTEDBY;

        $block['poster'] = '<a href="' . XOOPS_URL . '/userinfo.php?uid=' . $headline->uid() . '">' . $block['poster'] . '</a>';
    } else {
        $block['poster'] = $xoopsConfig['anonymous'];
    }

    $block['on'] = _ON;

    $block['published'] = formatTimestamp($headline->published());

    $block['hits'] = $headline->counter();

    $block['reads'] = _READS;

    $block['hometext'] = $headline->hometext();

    if ($headline->bodytext()) {
        $block['morelink'] = $link . _NW_READMORE . '</a>';
    }

    if (is_object($xoopsUser) && $xoopsUser->isAdmin($mod_news->getVar('mid'))) {
        $block['adminlink'] = $headline->adminlink();
    }

    return $block;
}
