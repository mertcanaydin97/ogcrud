<?php

namespace OG\OGCRUD\Actions;

class RestoreAction extends AbstractAction
{
    public function getTitle()
    {
        return __('ogcrud::generic.restore');
    }

    public function getIcon()
    {
        return 'voyager-trash';
    }

    public function getPolicy()
    {
        return 'restore';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-success pull-right restore',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'restore-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return route('ogcrud.'.$this->dataType->slug.'.restore', $this->data->{$this->data->getKeyName()});
    }
}
