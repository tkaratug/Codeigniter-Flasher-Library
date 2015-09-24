<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Flash Message Library
 * A Simple Flash Messaging Library to easily store flash data in session and view it in your page when loaded.
 *
 * @package 		Codeigniter
 * @subpackage 		Libraries
 * @category 		Session
 * @author 			Turan Karatuğ <http://www.turankaratug.com>
 * @version 		1.0
 */

class Flasher 
{
	private $CI;
	private $flash_message;

	function __construct()
	{
		$this->CI =& get_instance();

		// Check if session library is loaded
		if(!$this->CI->load->is_loaded('session'))
			show_error('Please load session library to use flash messages.');
	}

	/**
	 * Set Flash Data
	 * @param $message 	string
	 * @param $type 	string
	 * @param $url 		string
	 * @return void
	 */
	public function set_flash($message, $type, $url = null)
	{

		if(!$message)
			show_error('Please set a flash message.');

		if(!$type)
			show_error('Please set a flash message type.');

		$this->flash_message = [
			'type'		=> $type,
			'message'	=> $message,
			'url'		=> $url
		];

		$this->CI->session->set_flashdata('message', $this->flash_message);

		// Redirect
		if($url != null) {
			redirect($url);
		}
	}

	/**
	 * Get Flash Data with Styling
	 * @return string
	 */
	public function get_flash()
	{
		$this->flash_message = $this->CI->session->flashdata('message');
		return '<div class="alert alert-' . $this->flash_message['type'] .'">' . $this->flash_message['message'] . '</div>';
	}

	/**
	 * Get Flash Data
	 * @return array
	 */
	public function get_all()
	{
		return $this->CI->session->flashdata('message');
	}

}
