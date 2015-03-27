<?php

class UserAuthFuncTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->seed('UserTestSeeder');
    }

    /**
     * @test
     */
    public function it_shows_the_login_form() {
        $this->action('GET', 'AuthenticationController@getLogin');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function it_redirects_back_to_form_if_login_fail() {
        $credentials = [
            'username'  => 'test',
            'password'  => 'testfail',
        ];

        $this->action('POST', 'AuthenticationController@postLogin', $credentials);

        $this->assertRedirectedToAction(
            'AuthenticationController@getLogin',
            [],
            ['flash_message']
        );

        $this->assertFalse(Auth::check());
    }

    /**
     * @test
     */
    public function it_redirects_back_to_last_url_if_login_success() {
        $credentials = [
            'username'  => 'test',
            'password'  => 'test',
        ];

        $fake_back = '/it_should_be_back_there';

        $this->action('POST', 'AuthenticationController@postLogin', [],$credentials, [], [], ['HTTP_REFERER' => $fake_back]);

        $this->assertRedirectedTo($fake_back);

        $this->assertTrue(Auth::check());
    }

    /**
     * @test
     */
    public function it_redirects_to_login_form_if_logout_success() {
        $this->action('GET', 'AuthenticationController@getLogout');

        $this->assertRedirectedToAction(
            'AuthenticationController@getLogin',
            [],
            ['flash_message']
        );

        $this->assertFalse(Auth::check());
    }

    /**
     * @test
     */
    public function it_shows_the_signup_form() {
        $this->action('GET', 'AuthenticationController@getSignup');
        $this->assertResponseOk();
    }

}
