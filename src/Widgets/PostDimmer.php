<?php

namespace OG\OGCRUD\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OG\OGCRUD\Facades\OGCRUD;

class PostDimmer extends BaseDimmer
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
        $count = OGCRUD::model('Post')->count();
        $string = trans_choice('ogcrud::dimmer.post', $count);

        return view('ogcrud::dimmer', array_merge($this->config, [
            'icon'   => 'ogcrud-news',
            'title'  => "{$count} {$string}",
            'text'   => __('ogcrud::dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('ogcrud::dimmer.post_link_text'),
                'link' => route('ogcrud.posts.index'),
            ],
            'image' => ogcrud_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', OGCRUD::model('Post'));
    }
}
