<?php

namespace Tests\Unit\Resources\Views\Admin\Users;

use App\Model\User;
use Tests\BrowserTestCase as TestCase;

class ListTest extends TestCase
{
    protected $response;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutMiddleware();
        $this->response = $this->visit('/admin/user');
    }

    public function test_list_user_view()
    {
        $response = $this->response->see(trans('messages.user_list'));

        $this->assertStringContainsString('/admin/user', $response->currentUri);
    }

    public function test_search_by_email_field()
    {
        $response = $this->response
            ->type('12345', 'search')
            ->select('email', 'search_key')
            ->press('submit-search')
            ->see(trans('messages.no_item_list'))
            ->type('test', 'search')
            ->press('submit-search')
            ->see('testing@gmail.com')
            ->dontSee(trans('messages.no_item_list'))
            ->dontSee('admin@gmail.com');

        $this->assertStringContainsString('search=test&search_key=email', $response->currentUri);
    }

    public function test_search_by_username_field()
    {
        $response = $this->response
            ->type('12345', 'search')
            ->select('username', 'search_key')
            ->press('submit-search')
            ->see(trans('messages.no_item_list'))
            ->type('testing', 'search')
            ->press('submit-search')
            ->see('testing@gmail.com')
            ->dontSee(trans('messages.no_item_list'))
            ->dontSee('admin@gmail.com');

        $this->assertStringContainsString("search=testing&search_key=username", $response->currentUri);
    }

    public function test_search_by_full_name_field()
    {
        $response = $this->response
            ->type('12345', 'search')
            ->select('full_name', 'search_key')
            ->press('submit-search')
            ->see(trans('messages.no_item_list'))
            ->type('testing', 'search')
            ->press('submit-search')
            ->see('testing@gmail.com')
            ->dontSee(trans('messages.no_item_list'))
            ->dontSee('admin@gmail.com');

        $this->assertStringContainsString("search=testing&search_key=full_name", $response->currentUri);
    }

    public function test_search_by_phone_number_field()
    {
        $response = $this->response
            ->type('testing', 'search')
            ->select('phone_number', 'search_key')
            ->press('submit-search')
            ->see(trans('messages.no_item_list'))
            ->type('12345', 'search')
            ->press('submit-search')
            ->see('testing@gmail.com')
            ->dontSee(trans('messages.no_item_list'))
            ->dontSee('admin@gmail.com');

        $this->assertStringContainsString("search=12345&search_key=phone_number", $response->currentUri);
    }

    public function test_delete_user_button()
    {
        $user = User::where('email', 'testing@gmail.com')->first();

        if (!empty($user)) {
            $response = $this->json('DELETE',
                "/admin/user/delete/$user->id",
                [
                    '_token' => 'efg29hc23nf08qnw32N$',
                    'id' => $user->id,
                ]);

            $response->assertResponseOk();
            $response->assertResponseStatus(200);
            $response->dontSee('testing@gmail.com');
            $this->assertStringContainsString("/delete/$user->id", $response->currentUri);
        }
    }
}
