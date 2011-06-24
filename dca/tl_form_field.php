<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Leo Feyer 2005-2011
 * @author     Sven Rhinow <kservice@sr-tag.de>
 * @package    Backend
 * @license    LGPL
 * @filesource
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['imagecaptcha']='{type_legend},type,label;{imagecaptcha_legend:hide},fic_width,fic_height,fic_fontcolor,fic_linecolor,fic_bgcolor,fic_length,fic_fontsize,fic_charset,fic_charspace,fic_angle,fic_padding,fic_font;{expert_legend:hide},class,accesskey;{submit_legend},addSubmit';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_width'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_width'],
			'default'		  => 91,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_height'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_height'],
			'default'		  => 31,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_fontcolor'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_fontcolor'],
			'inputType'               => 'text',
			'default'		  => 'ffffff',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_form_field_helper', 'colorPicker')
			)
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_linecolor'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_linecolor'],
			'inputType'               => 'text',
			'default'		  => 'eeeeee',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_form_field_helper', 'colorPicker')
			)
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_bgcolor'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_bgcolor'],
			'inputType'               => 'text',
			'default'		  => '000000',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_form_field_helper', 'colorPicker')
			)
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_font'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_font'],
			'default'		  => 4,
			'inputType'               => 'select',
			'options_callback'        => array('tl_form_field_helper', 'getFonts'),
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_fontsize'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_fontsize'],
			'default'		  => 4,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_length'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_length'],
			'default'		  => 5,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_charspace'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_charspace'],
			'default'		  => 18,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_angle'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_angle'],
			'default'		  => 0,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fic_padding'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fic_padding'],
			'default'		  => 0,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
);
/**
 * Class tl_settinghelper copy from tl_style
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2009
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Controller
 */
class tl_form_field_helper extends Backend
{

        /**
	 * Add the mooRainbow scripts to the page
	 */
	public function __construct()
	{
		parent::__construct();

		$GLOBALS['TL_CSS'][] = 'plugins/mootools/rainbow.css';
		$GLOBALS['TL_JAVASCRIPT'][] = 'plugins/mootools/rainbow.js';
	}
	
	/**
	 * Return the color picker wizard
	 * @param object
	 * @return string
	 */
	public function colorPicker(DataContainer $dc)
	{
		return ' ' . $this->generateImage('pickcolor.gif', $GLOBALS['TL_LANG']['MSC']['colorpicker'], 'style="vertical-align:top; cursor:pointer;" id="moo_'.$dc->field.'" class="mooRainbow"');
	}
	
	/**
	 * Return all ttf-Files as array
	 * @return array
	 */
	public function getFonts()
	{
		$arrReturn = array();
		$arrFiles = scan(TL_ROOT . '/system/modules/NumberImageCaptcha/html');
                #print_r($arrFiles);
		foreach ($arrFiles as $strFile)
		{
			if (($strFile[0] == '.') || is_dir(TL_ROOT . '/system/modules/NumberImageCaptcha/html/' . $strFile) || !in_array(stristr($strFile,'.'),array('.ttf')) )
			{
			     continue;
			}
                       
			$arrReturn[$strFile] = $strFile;
		}

		return $arrReturn;
	}
 
}