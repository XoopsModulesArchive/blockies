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

function b_blockies_pphlogger_show($options)
{
    /*
     *	$options[0] -- URL to call PPhlogger
     *	$options[1] -- PPhlogger user id
     *	$options[2] -- PPhlogger show type (image/text)
     *	$options[3] -- track referrers on a framed site (true/false)
     *	$options[4] -- Show total hits (true/false)
     *	$options[5] -- Show total views (true/false)
     *	$options[6] -- Show today hits (true/false)
     *	$options[7] -- Show today views (true/false)
     *	$options[8] -- Show yesterday hits (true/false)
     *	$options[9] -- Show yesterday views (true/false)
     *	$options[10] -- Show current month hits (true/false)
     *	$options[11] -- Show current month views (true/false)
     *	$options[12] -- Show online users (true/false)
     *	$options[13] -- visibility of PPhlogger logo (true/false)
    */

    $pph_js = XOOPS_URL . '/modules/blockies/include/pphlogger.js';

    $logger_type = [];

    $logger_type[4] = 'hits';

    $logger_type[5] = 'pageviews';

    $logger_type[6] = 'today';

    $logger_type[7] = 'todayviews';

    $logger_type[8] = 'yesterday';

    $logger_type[9] = 'yesterdayviews';

    $logger_type[10] = 'month';

    $logger_type[11] = 'monthviews';

    $logger_type[12] = 'onlineusr';

    $block = [];

    $block['title'] = _BK_PPH_TITLE;

    //	vars to call pphlogger.js

    $block['script'] = "<script>pph_host = '" . $options[0] . "/pphlogger.php'; id = '" . $options[1] . "';";

    if ($options[3]) {
        $block['script'] .= ' pp_frames = true; ';
    }

    $block['script'] .= '</script>';

    $block['script'] .= "<script language='JavaScript' type='text/javascript' src='" . $pph_js . "'></script>\n";

    if ('js' == $options[2]) {
        define('_BLOCKIES_PPH_SHOW', "<script language='JavaScript' type='text/javascript' src='" . $options[0] . '/showhits.php?id=' . $options[1] . "&st=js&type=%s'></script>");
    } else {
        define('_BLOCKIES_PPH_SHOW', "<img alt='' src='" . $options[0] . '/showhits.php?id=' . $options[1] . "&st=img&type=%s'>");
    }

    $block['counters'] = [];

    for ($i = 4; $i <= 12; $i++) {
        if ($options[$i]) {
            $block['counters'][] = constant('_BK_PPH_SHOW_' . $i) . sprintf(_BLOCKIES_PPH_SHOW, $logger_type[$i]);
        }
    }

    if ($options[13]) {
        $block['logo'] = "<img src='" . XOOPS_URL . "/modules/blockies/images/pphlogger_logo.gif' alt=''>";
    }

    return $block;
}

function b_blockies_pphlogger_edit($options)
{
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form = [];

    $url = new XoopsFormText('', 'options[0]', 50, 255, $options[0]);

    $url = $url->render();

    $form[] = _BK_PPH_URL . '<br>' . $url;

    $id = new XoopsFormText('', 'options[1]', 20, 255, $options[1]);

    $id = $id->render();

    $form[] = _BK_PPH_ID . $id;

    $type = new XoopsFormSelect('', 'options[2]', $options[2]);

    $type->addOption('js', 'TEXT');

    $type->addOption('IMG', 'Image');

    $type = $type->render();

    $form[] = _BK_PPH_COUNTERYPE . $type;

    $frame = new XoopsFormRadioYN('', 'options[3]', $options[3]);

    $frame = $frame->render();

    $form[] = _BK_PPH_FRAME . $frame;

    $show_total_hits = new XoopsFormRadioYN('', 'options[4]', $options[4]);

    $form[] = _BK_PPH_SHOW_TOTAL_HITS . $show_total_hits->render();

    $show_total_views = new XoopsFormRadioYN('', 'options[5]', $options[5]);

    $form[] = _BK_PPH_SHOW_TOTAL_VIEWS . $show_total_views->render();

    $show_today_hits = new XoopsFormRadioYN('', 'options[6]', $options[6]);

    $form[] = _BK_PPH_SHOW_TODAY_HITS . $show_today_hits->render();

    $show_today_views = new XoopsFormRadioYN('', 'options[7]', $options[7]);

    $form[] = _BK_PPH_SHOW_TODAY_VIEWS . $show_today_views->render();

    $show_yesterday_hits = new XoopsFormRadioYN('', 'options[8]', $options[8]);

    $form[] = _BK_PPH_SHOW_YESTERDAY_HITS . $show_yesterday_hits->render();

    $show_yesterday_views = new XoopsFormRadioYN('', 'options[9]', $options[9]);

    $form[] = _BK_PPH_SHOW_YESTERDAY_VIEWS . $show_yesterday_views->render();

    $show_month_hits = new XoopsFormRadioYN('', 'options[10]', $options[10]);

    $form[] = _BK_PPH_SHOW_MONTH_HITS . $show_month_hits->render();

    $show_month_views = new XoopsFormRadioYN('', 'options[11]', $options[11]);

    $form[] = _BK_PPH_SHOW_MONTH_VIEWS . $show_month_views->render();

    $show_online_users = new XoopsFormRadioYN('', 'options[12]', $options[12]);

    $form[] = _BK_PPH_SHOW_ONLINE_USERS . $show_online_users->render();

    $logo = new XoopsFormRadioYN('', 'options[13]', $options[13]);

    $logo = $logo->render();

    $form[] = _BK_PPH_SHOW_PPHLOGO . $logo;

    $ret = '';

    foreach ($form as $item) {
        $ret .= $item . '<br>';
    }

    return $ret;
}
