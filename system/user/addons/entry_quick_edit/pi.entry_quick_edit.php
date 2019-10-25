<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry_quick_edit {

    public $member_id;
    public $member_data;
    public $params;
    public $edit_url;

    public function __construct() {
        $this->member_id = ee()->session->userdata('member_id');
        $this->member_data = ee('Model')->get('Member', $this->member_id)->with('MemberGroup')->first();
        $this->params = ee()->TMPL->tagparams;
    }

    public function button() {
        if (self::approved_to_edit()) {
            $button_css = self::get_css();
            $edit_button = '<a href="'.$this->edit_url.'" target="_blank" id="omb-quick-edit-button">Edit</a>';
            return $button_css . $edit_button;
        } else {
            return;
        }
    }

    public function url() {
        if (self::approved_to_edit()) {
            return $this->edit_url;
        } else {
            return;
        }
    }

    public function get_css() {
        $font_color = (isset($this->params['color'])) ? $this->params['color'] : "#fff";
        $font_color_hover = (isset($this->params['color-hover'])) ? $this->params['color-hover'] : "#fff";
        $background_color = (isset($this->params['background-color'])) ? $this->params['background-color'] : "#ff6600";
        $background_color_hover = (isset($this->params['background-color-hover'])) ? $this->params['background-color-hover'] : "#cf5402";

        $css = '<style type="text/css">';
        $css .= file_get_contents( PATH_THIRD . '/entry_quick_edit/css/helper.css');
        $css .= '#omb-quick-edit-button{color:' . $font_color . ';background-color:' . $background_color . ';}';
        $css .= '#omb-quick-edit-button:hover{color:' . $font_color_hover. ';background-color:' . $background_color_hover . ';}';
        $css .= '</style>';

        return $css;
    }

    function approved_to_edit() {
        // Make sure the user is logged in and an entry id has been passed
        if ($this->member_data == NULL || !is_numeric($this->params['entry_id'])) {
            return FALSE;
        }

        // Get Channel ID
        $query = ee()->db->select('channel_id')->get_where('channel_data', array('entry_id' => $this->params['entry_id']));
        if ($query->num_rows() > 0) {
            $channel_id = $query->row()->channel_id;
        } else {
            return FALSE;
        }

        $approved_channels = $this->member_data->MemberGroup->AssignedChannels->pluck('channel_id');

        // Are they approved to edit entries in the given channel?
        if ((isset($approved_channels) && in_array($channel_id, $approved_channels)) || $this->member_data->MemberGroup->getId() == 1) {
            $this->edit_url = ee('CP/URL')->make('publish/edit/entry/'.$this->params['entry_id'], null, ee()->config->item('cp_url'));
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file pi.entry_quick_edit.php */
/* Location: ./system/user/addons/entry_quick_edit/pi.entry_quick_edit.php */