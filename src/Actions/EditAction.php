<?php

namespace OG\OGCRUD\Actions;

class EditAction extends AbstractAction
{
    public function getTitle()
    {
        return __('ogcrud::generic.edit');
    }

    public function getIcon()
    {
        return 'voyager-edit';
    }

    public function getPolicy()
    {
        return 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right edit',
        ];
    }

    public function getDefaultRoute()
    {
        return route('ogcrud.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }
}
