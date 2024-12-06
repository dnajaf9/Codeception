<?php

namespace Tests\Support\Page\Acceptance;
use Tests\Support\AcceptanceTester;

class Posts

{
    protected $PostTitle = ['css' => 'h1.editor-post-title__input'];

    public function addNewPost(AcceptanceTester $I, $PostTitle)
    {
        $I->click('Add New Post');
        $I->seeInTitle('Add New Post');
        $I->wait(3);

        $I->switchToIFrame('editor-canvas');
        $I->waitForElement($PostTitle, 10);
    }
}