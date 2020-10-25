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

//	This file does the same thing as Xoops user-login, but brings users back to where there were.
// ORIGINAL FILE in /user.php by Xoops Team<xoops.codigolivre.org.br>

$xoopsOption['pagetype'] = 'user';
require dirname(__DIR__, 3) . '/mainfile.php';

if (!$xoopsUser) {
    if ('login' == $_POST['op']) {
        $location = $_POST['scriptname'];

        if (!empty($_POST['querystring'])) {
            $location .= '?' . $_POST['querystring'];
        }

        if (empty($location)) {
            $location = XOOPS_URL;
        }

        $uname = !isset($_POST['uname']) ? '' : trim($_POST['uname']);

        $pass = !isset($_POST['pass']) ? '' : trim($_POST['pass']);

        if ('' == $uname || '' == $pass) {
            redirect_header($location, 0, _US_INCORRECTLOGIN);

            exit();
        }

        $memberHandler = xoops_getHandler('member');

        $user = $memberHandler->loginUser($uname, md5($pass));

        if (false !== $user) {
            if (0 == $user->getVar('level')) {
                redirect_header($location, 0, _US_NOACTTPADM);

                exit();
            }

            $user->setVar('last_login', time());

            $memberHandler->insertUser($user);

            $HTTP_SESSION_VARS = [];

            $HTTP_SESSION_VARS['xoopsUserId'] = $user->getVar('uid');

            $HTTP_SESSION_VARS['xoopsUserGroups'] = $user->getGroups();

            if ($xoopsConfig['use_mysession'] && '' != $xoopsConfig['session_name']) {
                setcookie($xoopsConfig['session_name'], session_id(), time() + $xoopsConfig['session_expire'], '/', '', 0);
            }

            redirect_header($location, 0, sprintf(_US_LOGGINGU, $user->getVar('uname')));

            exit();
        }

        redirect_header($location, 0, _US_INCORRECTLOGIN);

        exit();
    }

    echo '<script>history.go(-1);</script>';

    exit();
}
    echo '<script>history.go(-1);</script>';
    exit();
