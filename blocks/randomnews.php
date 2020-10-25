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

function b_blockies_randomnews_show($options)
{
    $block = [];

    global $xoopsModule, $xoopsConfig, $xoopsDB;

    if (!is_object($xoopsModule) || 'news' != $xoopsModule->getVar('dirname')) {
        $moduleHandler = xoops_getHandler('module');

        $mod_news = $moduleHandler->getByDirname('news');

        if (!$mod_news || !$mod_news->getVar('isactive')) {
            return false;
        }
    } else {
        $mod_news = $xoopsModule;
    }

    require_once XOOPS_ROOT_PATH . '/modules/news/class/class.newsstory.php';

    $today = mktime(0, 0, 0);

    if (!empty($options[1])) {
        $day_limit = $today - ($options[1] * 86400);
    }

    $sql = 'SELECT * FROM ' . $xoopsDB->prefix('stories') . ' WHERE published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ')';

    if (!empty($day_limit)) {
        $sql .= ' AND published > ' . $day_limit;
    }

    $sql .= ' AND ihome = 0';

    // 	echo $sql;

    $result = $xoopsDB->query($sql);

    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $news[] = new NewsStory($myrow);
    }

    if (!count($news)) {
        return false;
    }

    $block['timer'] = $options[2] * 1000;

    if (count($news) < $options[0]) {
        $block['count'] = count($news) - 1;
    } else {
        $block['count'] = $options[0] - 1;
    }

    shuffle($news);

    for ($i = 0; $i <= $block['count']; $i++) {
        $links[] = '"<a href=\'' . XOOPS_URL . '/modules/news/article.php?storyid=' . $news[$i]->storyid() . '\'>' . $news[$i]->title() . '</a>"';
    }

    $block['links'] = implode(', ', $links);

    return $block;
}

function b_blockies_randomnews_edit($options)
{
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $num = new XoopsFormText('', 'options[0]', 5, 2, $options[0]);

    $num = $num->render();

    $form[] = _BK_RN_NUM . ' ' . $num;

    $day = new XoopsFormText('', 'options[1]', 5, 2, $options[1]);

    $day = $day->render();

    $form[] = _BK_RN_DAY . ' ' . $day;

    $time = new XoopsFormText('', 'options[2]', 5, 2, $options[2]);

    $time = $time->render();

    $form[] = _BK_RN_TIME . ' ' . $time;

    $ret = '';

    foreach ($form as $item) {
        $ret .= $item . '<br>';
    }

    return $ret;
}
