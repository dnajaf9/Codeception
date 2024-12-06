<?php

namespace Tests\Support\Helper;
use Tests\Support\AcceptanceTester;

trait LoginHelper

{

    protected $usernameField = ['id' => 'user_login'];
    protected $passwordField = ['id' => 'user_pass'];
    
    protected $loginButton = ['id' => 'wp-submit'];  // Replace with actual login button locator if different
    protected $loginForm = 'form#loginform';
    protected $title = ['css' => 'h1.editor-post-title__input'];


    public function login(AcceptanceTester $I, $username, $password)
    {

        $I->see('Username or Email Address');
        
        $I->fillField($this->usernameField, $username);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);

        $I->see('Dashboard');
       
    }


    public function addNewPost(AcceptanceTester $I, $title )
    {
        $I->click('Add New Post');
        $I->seeInTitle('Add New Post');
        $I->wait(3);

        $I->switchToIFrame('editor-canvas');
        $I->waitForElement($this->title, 10);
        $I->fillField($this->title, $title);
        

        // $I->switchToIFrame(); // Switch back from the iframe
        // $I->wait(3);
        // $I->click(['id' => 'tabs-0-edit-post/block']);
        
        // $I->switchToIFrame('editor-canvas');
        $locator = 'div.is-root-container p[contenteditable="true"]';
        // Use executeJS to send text to the contenteditable element
$I->executeJS("
const element = document.querySelector('$locator');
if (element) {
    element.innerHTML = 'Your text goes here'; // Set the inner HTML
    const event = new Event('input', { bubbles: true });
    element.dispatchEvent(event); // Trigger input event to mimic user interaction
}
");


        // $I->click('.block-editor-rich-text__editable.rich-text');
        // $I->fillField('.block-editor-rich-text__editable.rich-text', "Post content");

        $I->click('//button[@type="button" and text()="Publish" and @aria-expanded="false"]');
        $I->wait(3);
        // $I->switchToIFrame();
        $I->click('div[class="editor-post-publish-panel__header-publish-button"] button[type="button"]');
        $I->wait(3);

    }

    // ..
}