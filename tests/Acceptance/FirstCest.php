<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\LoginHelper;
use PHPUnit\Framework\TestCase;

class FirstCest
{
    use LoginHelper;    

    public function testLogin(AcceptanceTester $I)

    {
        $I->amOnPage('/admin');
        $this->_loginHelper($I, 'admin', 'sh43YJ7OmfrQElqIFlNX2WVB');
        $I->see('Dashboard');
        

        $I->amOnPage('/wp-admin/edit.php');
        // $I->seeInTitle('Posts');

        $Title = 'Winter is coming! ' . time();
        $this->_addNewPostHelper($I, $Title);
        
        $I->amOnPage('/');
        $I->see($Title);


        
    }
}
