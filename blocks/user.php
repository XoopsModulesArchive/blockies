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

function b_blockies_user_show($options)
{
    global $xoopsUser, $xoopsConfig, $HTTP_COOKIE_VARS, $xoopsDB, $HTTP_SERVER_VARS;

    if (!$xoopsUser) {
        $block = [];

        $block['title'] = _BK_USER_LOGIN;

        $block['type'] = 'login';

        $block['lang_username'] = _BK_USER_NAME;

        $block['unamevalue'] = '';

        if (isset($HTTP_COOKIE_VARS[$xoopsConfig['usercookie']])) {
            $block['unamevalue'] = $HTTP_COOKIE_VARS[$xoopsConfig['usercookie']];
        }

        $block['lang_password'] = _BK_USER_PASS;

        $block['lang_login'] = _BK_USER_LOGIN;

        $block['lang_lostpass'] = _BK_USER_LOSTPASS;

        $block['lang_registernow'] = _BK_USER_REGISTER;

        $block['scriptname'] = $HTTP_SERVER_VARS['SCRIPT_NAME'];

        $block['querystring'] = $HTTP_SERVER_VARS['QUERY_STRING'];

        return $block;
    }

    $block = [];

    $block['title'] = sprintf(_BK_USER_MENU, $xoopsUser->getVar('uname'));

    $block['type'] = 'user';

    $block['avatar'] = $xoopsUser->getVar('user_avatar');

    if ('blank.gif' != $block['avatar'] || !empty($options[0])) {
        $block['avatar_width'] = $options[0];
    }

    $block['uid'] = $xoopsUser->getVar('uid');

    $block['avatar_title'] = $xoopsUser->getVar('uname');

    $block['lang_youraccount'] = _BK_USER_ACCOUNT;

    $block['lang_logout'] = _BK_USER_LOGOUT;

    // Code for Messages

    [$block['total_messages']] = $xoopsDB->fetchRow($xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('priv_msgs') . ' WHERE to_userid = ' . $xoopsUser->getVar('uid') . ''));

    [$block['new_messages']] = $xoopsDB->fetchRow($xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('priv_msgs') . ' WHERE to_userid = ' . $xoopsUser->getVar('uid') . ' AND read_msg=0'));

    $block['lang_inbox'] = _BK_USER_INBOX;

    if ($xoopsUser->isAdmin()) {
        $block['lang_adminmenu'] = _BK_USER_ADMIN;
    }

    // Code for Messages

    return $block;

    return false;
}

function b_blockies_user_edit($options)
{
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $text = new XoopsFormText('', 'options[]', 3, 5, $options[0]);

    $ret = $text->render();

    $ret = sprintf(_BK_USER_OPTION_AVATAR_WIDTH, $ret);

    return $ret;
}
