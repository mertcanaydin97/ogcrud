<?php

namespace OG\OGCRUD\Tests;

use Illuminate\Support\Facades\Auth;

class AssetsTest extends TestCase
{
    protected $prefix = '/voyager-assets?path=';

    public function setUp(): void
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    public function testCanOpenFileInAssets()
    {
        $url = route('ogcrud.dashboard').$this->prefix.'css/app.css';

        $response = $this->call('GET', $url);
        $this->assertEquals(200, $response->status(), $url.' did not return a 200');
    }

    public static function urlProvider()
    {
        return [
            [
                '../dummy_content/pages/page1.jpg',
                '..../dummy_content/pages/page1.jpg',
                'images/../../dummy_content/pages/page1.jpg',
                '....//dummy_content/pages/page1.jpg',
                '..\dummy_content/pages/page1.jpg',
                '....\dummy_content/pages/page1.jpg',
                'images/..\..\dummy_content/pages/page1.jpg',
                'images/....\\....\\dummy_content/pages/page1.jpg',
            ],
        ];
    }

    /**
     * @dataProvider  urlProvider
     */
    public function testCannotOpenFileOutsideAssets($url)
    {
        $response = $this->call('GET', route('ogcrud.dashboard').$this->prefix.$url);
        $this->assertContains($response->status(), [404, 500], $url.' did not return a 404 or 500');
    }
}
