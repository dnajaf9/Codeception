<?php

namespace Tests\Support\Helper;

trait LoginHelper

{

    protected $usernameField = ['id' => 'user_login'];
    protected $passwordField = ['id' => 'user_pass'];
    
    protected $loginButton = ['id' => 'wp-submit'];  // Replace with actual login button locator if different
    protected $loginForm = 'form#loginform';
    protected $title = ['css' => 'h1.editor-post-title__input'];


    public function _loginHelper($I, $username, $password)
    {
        $I->amOnPage('/admin');
        $I->see('Username or Email Address');  
        $I->fillField($this->usernameField, $username);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);
       
    }


    public function _addNewPostHelper($I, $title )
    {
        $I->click(['css'=>'a.page-title-action']);
        $I->seeInTitle('Add New Post');
        $I->wait(3);

        $I->switchToIFrame('editor-canvas');
        $I->waitForElement($this->title, 10);
        $I->fillField($this->title, $title);

        $I->click('p[role="button"]');
        $I->fillfield('p[role="document"]',  "When winter comes, the lone wolf dies but the pack survives");

        $I->switchToIFrame();

        $I->click('//button[@type="button" and text()="Publish" and @aria-expanded="false"]');
        $I->click('div[class="editor-post-publish-panel__header-publish-button"] button[type="button"]');

        $I->waitForText('Post published', 10);

    }

    // ..
}