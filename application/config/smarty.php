<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Project:     Smarty config: the PHP compiling template engine config
 * File:        smarty.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * For questions, help, comments, discussion, etc., please join the
 * Smarty mailing list. Send a blank e-mail to
 * smarty-discussion-subscribe@googlegroups.com
 *
 * @link      http://www.smarty.net/
 * @copyright 2016 New Digital Group, Inc.
 * @copyright 2016 Uwe Tews
 * @author    Monte Ohrt <monte at ohrt dot com>
 * @author    Uwe Tews
 * @author    Rodney Rehm
 * @package   Smarty
 * @version   3.1.31
 */

$config['left_delimiter']	= '{{';
$config['right_delimiter']	= '}}';
$config['template_dir']		= VIEWPATH;
$config['compile_dir']		= WRITABLEPATH.'temp';
$config['config_dir']		= APPPATH.'config';
$config['cache_dir']		= WRITABLEPATH.'cache';
$config['force_compile']	= ENVIRONMENT==='development'?TRUE:FALSE;
$config['compile_check']	= ENVIRONMENT==='development'?TRUE:FALSE;
$config['caching']			= ENVIRONMENT==='development'?FALSE:TRUE;
$config['cache_lifetime']	= ENVIRONMENT==='development'?0:(60*60*24);