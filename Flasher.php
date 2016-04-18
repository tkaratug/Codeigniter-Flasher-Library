<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Flash Message Library
 * A Simple Flash Messaging Library to easily store flash data in session and view it in your page when loaded.
 *
 * @package         Codeigniter
 * @subpackage      Libraries
 * @category        Session
 * @author          Turan Karatuğ <http://www.turankaratug.com>
 * @version         1.0
 */

class Flasher
{
    private $CI;
    private $flash_message;

    function __construct()
    {
        $this->CI =& get_instance();

        // Check if session library is loaded
        if (!$this->CI->load->is_loaded('session'))
            show_error('Please load session library to use flash messages.');
    }

    /**
     * Set Flash Data
     * @param $message  string
     * @param $type     string
     * @param $url      string
     * @return void
     */
    public function set_message($message, $type, $url = null, $dismissable = false)
    {
        if (!$message)
            show_error('Please set a flash message.');

        if (!$type)
            show_error('Please set a flash message type.');

        $this->flash_message = [
            'type'          => $type,
            'message'       => $message,
            'url'           => $url,
            'dismissable'   => $dismissable,
        ];

        $this->CI->session->set_flashdata('message', $this->flash_message);

        // Redirect
        if ($url !== null)
        {
            redirect($url);
        }
    }

    /**
     * Set Success Flash Data
     * @param string $message
     * @param string|null $url
     * @return void
     */
    public function set_success($message, $url = null, $dismissable = false)
    {
        $this->set_message($message, 'success', $url, $dismissable);
    }

    /**
     * Set Info Flash Data
     * @param string $message
     * @param string|null $url
     * @return void
     */
    public function set_info($message, $url = null, $dismissable = false)
    {
        $this->set_message($message, 'info', $url, $dismissable);
    }

    /**
     * Set Warning Flash Data
     * @param string $message
     * @param string|null $url
     * @return void
     */
    public function set_warning($message, $url = null, $dismissable = false)
    {
        $this->set_message($message, 'warning', $url, $dismissable);
    }

    /**
     * Set Danger Flash Data
     * @param string $message
     * @param string|null $url
     * @return void
     */
    public function set_danger($message, $url = null, $dismissable = false)
    {
        $this->set_message($message, 'danger', $url, $dismissable);
    }

    /**
     * Get Flash Data with Styling
     * @return string
     */
    public function get_message()
    {
        $this->flash_message = $this->CI->session->flashdata('message');
        $ouput = '<div class="alert alert-' . $this->flash_message['type'] . ($this->flash_message['dismissable'] == true ? " alert-dismissable" : "") . '">';
        if ($this->flash_message['dismissable'] == true) {
            $ouput .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        }
        $ouput .= $this->flash_message['message'] . '</div>';
        return $ouput;
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
