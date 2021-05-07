<?php
class RlB_TemplateFilter_insertedit extends PerchTemplateFilter {
    public $returns_markup = true;
    public function filterBeforeProcessing($value, $valueIsMarkup = false) {
        // $editLink = '<a href="'.$this->content['pageID'].
        //             '-'.$this->content['regionID'].
        //             '-'.$this->content['itemID'].
        //             '">Edit</a>';
        $editLink = '<a class="region_editor hide_this" href="/perch/core/apps/content/edit/?id='.$this->content['regionID'].
                    '&itm='.$this->content['itemID'].'"></a>';

        $output = $editLink.$value;
        return $output;
    }
}
PerchSystem::register_template_filter('insertedit', 'RlB_TemplateFilter_insertedit');
