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

function b_blockies_modulemenu_show($options)
{
    global $xoopsModule, $xoopsUser;

    if (!is_object($xoopsModule)) {
        return false;
    }

    $block = [];

    $block['mod_name'] = $xoopsModule->getVar('name');

    $block['submenu'] = [];

    $block['submenu'][] = "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/'>" . _BK_MODMENU_MAINLINK . '</a>';

    $submenus = $xoopsModule->subLink();

    if (!empty($submenus) || 'y' == $options[1]) {
        if (!empty($submenus)) {
            foreach ($submenus as $menu) {
                $block['submenu'][] = "<a href='" . $menu['url'] . "'>" . $menu['name'] . '</a>';
            }
        }

        if ('y' == $options[0]) {
            if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->getVar('mid')) && $xoopsModule->getVar('hasadmin')) {
                $block['submenu'][] = "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/admin/'>" . _BK_MODMENU_ADMINLINK . '</a>';
            }
        }
    } else {
        return false;
    }

    return $block;
}

function b_blockies_modulemenu_edit($options)
{
    $form = '';

    $form .= _BK_MODMENU_SHOWADMINLINK . "&nbsp;<input type='radio' id='options[0]' name='options[0]' value='y'";

    if ('y' == $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _YES . "<input type='radio' id='options[0]' name='options[0]' value='n'";

    if ('y' != $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _NO . '';

    $form .= '<br>' . _BK_MODMENU_SHOWIFNOSUBMENU . "&nbsp;<input type='radio' id='options[1]' name='options[1]' value='y'";

    if ('y' == $options[1]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _YES . "<input type='radio' id='options[1]' name='options[1]' value='n'";

    if ('y' != $options[1]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _NO . '';

    return $form;
}
