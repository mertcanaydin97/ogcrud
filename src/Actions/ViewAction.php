<?php

namespace OG\OGCRUD\Actions;

class ViewAction extends AbstractAction
{
    public function getTitle()
    {
        return __('ogcrud::generic.view');
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning pull-right view',
        ];
    }

    public function getDefaultRoute()
    {
        return route('ogcrud.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
