# Codeception
This repository contains Wordpress Admin test cases with Codeception

Test case decription: 
- Login to a WordPress site: https://sdet.wpforms.wpfc.io/
- Create a post or a page.
- Assert in the front-end that the post/page is published.

Test cases are added in FirstCest.php file in tests\Acceptance folder. The test suite uses Page Object Model where locators and functions are present in tests\Support\Helper\LoginHelper.php file. 

- The test case is written in Codeception framework using PHP
- It uses POM to separate test cases and locators
- The test suite repository is fully integrated with GitHub Actions and the workflows can be viewed in the Actions tab

To run the test cases:
 - Install Codeception via composer: composer require "codeception/codeception" --dev
 - Initialize Codeception: php vendor/bin/codecept bootstrap
 - Install standalone selenium server
        brew install selenium-server | brew services start selenium-server
 - Run: vendor/bin/codecept run Acceptance