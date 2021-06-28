<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '<font style="color:red">* The {field} field is required.</font>';
$lang['form_validation_isset']			= '<font style="color:red">*  {field} field must have a value.</font>';
$lang['form_validation_valid_email']		= '<font style="color:red">*  {field} field must contain a valid email address.</font>';
$lang['form_validation_valid_emails']		= '<font style="color:red">*  {field} field must contain all valid email addresses.</font>';
$lang['form_validation_valid_url']		= '<font style="color:red">*  {field} field must contain a valid URL.</font>';
$lang['form_validation_valid_ip']		= '<font style="color:red">*  {field} field must contain a valid IP.</font>';
$lang['form_validation_valid_base64']		= '<font style="color:red">*  {field} field must contain a valid Base64 string.</font>';
$lang['form_validation_min_length']		= '<font style="color:red">*  {field} field must be at least {param} characters in length.</font>';
$lang['form_validation_max_length']		= '<font style="color:red">*  {field} field cannot exceed {param} characters in length.</font>';
$lang['form_validation_exact_length']		= '<font style="color:red">*  {field} field must be exactly {param} characters in length.</font>';
$lang['form_validation_alpha']			= '<font style="color:red">*  {field} field may only contain alphabetical characters.</font>';
$lang['form_validation_alpha_numeric']		= '<font style="color:red">*  {field} field may only contain alpha-numeric characters.</font>';
$lang['form_validation_alpha_numeric_spaces']	= '<font style="color:red">*  {field} field may only contain alpha-numeric characters and spaces.</font>';
$lang['form_validation_alpha_dash']		= '<font style="color:red">*  {field} field may only contain alpha-numeric characters, underscores, and dashes.</font>';
$lang['form_validation_numeric']		= '<font style="color:red">*  {field} field must contain only numbers.</font>';
$lang['form_validation_is_numeric']		= '<font style="color:red">*  {field} field must contain only numeric characters.</font>';
$lang['form_validation_integer']		= '<font style="color:red">*  {field} field must contain an integer.</font>';
$lang['form_validation_regex_match']		= '<font style="color:red">*  {field} field is not in the correct format.</font>';
$lang['form_validation_matches']		= '<font style="color:red">*  {field} field does not match the {param} field.</font>';
$lang['form_validation_differs']		= '<font style="color:red">*  {field} field must differ from the {param} field.</font>';
$lang['form_validation_is_unique'] 		= '<font style="color:red">* {field} field must contain a unique value.</font>';
$lang['form_validation_is_natural']		= '<font style="color:red">* {field} field must only contain digits.</font>';
$lang['form_validation_is_natural_no_zero']	= '<font style="color:red">* {field} field must only contain digits and must be greater than zero.</font>';
$lang['form_validation_decimal']		= '<font style="color:red">* {field} field must contain a decimal number.</font>';
$lang['form_validation_less_than']		= '<font style="color:red">* {field} field must contain a number less than {param}.</font>';
$lang['form_validation_less_than_equal_to']	= '<font style="color:red">* {field} field must contain a number less than or equal to {param}.</font>';
$lang['form_validation_greater_than']		= '<font style="color:red">* {field} field must contain a number greater than {param}.</font>';
$lang['form_validation_greater_than_equal_to']	= '<font style="color:red">* {field} field must contain a number greater than or equal to {param}.</font>';
$lang['form_validation_error_message_not_set']	= 'Unable to access an error message corresponding to your field name {field}.</font>';
$lang['form_validation_in_list']		= '<font style="color:red">* {field} field must be one of: {param}.</font>';
