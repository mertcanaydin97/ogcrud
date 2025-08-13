<?php

namespace OG\OGCRUD\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OG\OGCRUD\Facades\OGCRUD;

class UserDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = OGCRUD::model('User')->count();
        $string = trans_choice('ogcrud::dimmer.user', $count);

        return view('ogcrud::dimmer', array_merge($this->config, [
            'icon'   => 'ogcrud-group',
            'title'  => "{$count} {$string}",
            'text'   => __('ogcrud::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('ogcrud::dimmer.user_link_text'),
                'link' => route('ogcrud.users.index'),
            ],
            'image' => ogcrud_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', OGCRUD::model('User'));
    }
}
