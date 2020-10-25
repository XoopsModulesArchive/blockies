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

$modversion['name'] = _BK_NAME;
$modversion['version'] = 0.5;
$modversion['description'] = _BK_DESC;
$modversion['author'] = 'NS Tai (aka tuff)';
$modversion['credits'] = "<a href='http://www.brandycoke.com/'>BRANDYCOKE&middot;COM</a>
						<br><a href='http://xoops.codigolivre.org.br/' target='_blank'>XOOPS</a>
						<br><a href='http://www.phpee.com/ target='_blank''>PPhlogger</a>";
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/blockies.png';
$modversion['dirname'] = 'blockies';

// Admin things
$modversion['hasAdmin'] = 0;

// Blocks
/*	login/user block, deprecated
$modversion['blocks'][1]['file'] = "user.php";
$modversion['blocks'][1]['name'] = _BK_BNAME1;
$modversion['blocks'][1]['description'] = _BK_BNAME1_DESC;
$modversion['blocks'][1]['show_func'] = "b_blockies_user_show";
$modversion['blocks'][1]['edit_func'] = "b_blockies_user_edit";
$modversion['blocks'][1]['options'] = "0";
$modversion['blocks'][1]['template'] = 'block_user.html';
*/

$modversion['blocks'][2]['file'] = 'pphlogger.php';
$modversion['blocks'][2]['name'] = _BK_BNAME2;
$modversion['blocks'][2]['description'] = _BK_BNAME2_DESC;
$modversion['blocks'][2]['show_func'] = 'b_blockies_pphlogger_show';
$modversion['blocks'][2]['options'] = 'http://domainname.com/pphlogger|yourid|js|0|1|0|1|0|1|0|1|0|1|0';
$modversion['blocks'][2]['edit_func'] = 'b_blockies_pphlogger_edit';
$modversion['blocks'][2]['template'] = 'block_pphlogger.html';

$modversion['blocks'][3]['file'] = 'modulemenu.php';
$modversion['blocks'][3]['name'] = _BK_BNAME3;
$modversion['blocks'][3]['description'] = _BK_BNAME3_DESC;
$modversion['blocks'][3]['show_func'] = 'b_blockies_modulemenu_show';
$modversion['blocks'][3]['edit_func'] = 'b_blockies_modulemenu_edit';
$modversion['blocks'][3]['options'] = 'y|n';
$modversion['blocks'][3]['template'] = 'block_module_menu.html';

$modversion['blocks'][4]['file'] = 'headline.php';
$modversion['blocks'][4]['name'] = _BK_BNAME4;
$modversion['blocks'][4]['description'] = _BK_BNAME4_DESC;
$modversion['blocks'][4]['show_func'] = 'b_blockies_headline_show';
$modversion['blocks'][4]['template'] = 'block_headline.html';

$modversion['blocks'][5]['file'] = 'randomnews.php';
$modversion['blocks'][5]['name'] = _BK_BNAME5;
$modversion['blocks'][5]['description'] = _BK_BNAME5_DESC;
$modversion['blocks'][5]['show_func'] = 'b_blockies_randomnews_show';
$modversion['blocks'][5]['edit_func'] = 'b_blockies_randomnews_edit';
$modversion['blocks'][5]['options'] = '3|0|5';
$modversion['blocks'][5]['template'] = 'block_randomnews.html';

$modversion['blocks'][6]['file'] = 'search.php';
$modversion['blocks'][6]['name'] = _BK_BNAME6;
$modversion['blocks'][6]['description'] = _BK_BNAME6_DESC;
$modversion['blocks'][6]['show_func'] = 'b_blockies_search_show';
$modversion['blocks'][6]['edit_func'] = 'b_blockies_search_edit';
$modversion['blocks'][6]['options'] = '0|0|1|s|http://www.google.com/search';
$modversion['blocks'][6]['template'] = 'block_search.html';

// Menu
$modversion['hasMain'] = 0;
