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

function b_blockies_search_show($options)
{
    global $xoopsConfig;

    $block = [];

    $block['char'] = empty($options[0]) ? 'UTF-8' : _CHARSET;

    $block['lang'] = empty($options[1]) ? '' : _LANGCODE;

    $block['default'] = $options[2];

    $block['key'] = $options[3];

    $block['link'] = $options[4];

    $block['httphost'] = xoops_getenv('HTTP_HOST');

    $block['lang_search_site'] = sprintf(_BK_SEARCH_SITE, $xoopsConfig['sitename']);

    $block['lang_search_www'] = _BK_SEARCH_WWW;

    $block['lang_search_go'] = _BK_SEARCH_GO;

    return $block;
}

function b_blockies_search_edit($options)
{
    $ret = '';

    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $char = new XoopsFormSelect('', 'options[]', $options[0]);

    $char->addOption(0, _BK_SCH_CHAR_UNICODE);

    $char->addOption(1, sprintf(_BK_SCH_USE_SITE, _CHARSET));

    $ret .= _BK_SCH_CHAR . $char->render() . '<br>';

    $lang = new XoopsFormSelect('', 'options[]', $options[1]);

    $lang->addOption(0, _BK_SCH_LANG_ANY);

    $lang->addOption(1, sprintf(_BK_SCH_USE_SITE, _LANGCODE));

    $ret .= _BK_SCH_LANG . $lang->render() . '<br>';

    $default = new XoopsFormSelect('', 'options[]', $options[2]);

    $default->addOption(1, _BK_SCH_DEFAULT_SITE);

    $default->addOption(0, _BK_SCH_DEFAULT_WWW);

    $ret .= _BK_SCH_DEFAULT . $default->render() . '<br>';

    $key = new XoopsFormText('', 'options[]', 2, 1, $options[3]);

    $ret .= _BK_SCH_KEY . $key->render() . '<br>';

    $key = new XoopsFormText('', 'options[]', 25, 255, $options[4]);

    $ret .= _BK_SCH_GOOGLE_URL . $key->render();

    return $ret;
}
