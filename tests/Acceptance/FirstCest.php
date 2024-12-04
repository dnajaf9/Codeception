<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function DashboardLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/admin');
        $I->see('Username or Email Address');
        
        $I->fillField(['id' => 'user_login'], 'admin');  // Username
        $I->fillField(['id' => 'user_pass'], 'sh43YJ7OmfrQElqIFlNX2WVB');  // Password
        $I->click('#wp-submit');
        $I->see('Dashboard');

        $I->amOnPage('/wp-admin/edit.php');
        $I->seeInTitle('Posts');

        $I->click('Add New Post');
        $I->seeInTitle('Add New Post');
        $I->wait(3);

        $postTitle = 'Winter is coming! ' . time();
        $I->switchToIFrame('editor-canvas');
        $I->waitForElement(['css' => 'h1.editor-post-title__input'], 10);
       
        $I->fillField(['css' => 'h1.editor-post-title__input'], 'My First Automated Blog Post');

     //   $I->switchToIFrame('.block-editor-iframe__html');
       
     $I->fillField('//p//span[@data-rich-text-placeholder="Type / to choose a block"]', 'Your new text here');

        $I->switchTo();


       
    }
}
