<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
        $I->wantTo('log in to site');
        $I->amOnPage('/');
        $I->click('Login';
        $I->fillField('email', 'leonv@gmail.com');
        $I->fillField('password', '123456');
        $I->click('Enter');
        $I->seeInCurrentUrl('/dashboard');
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }
}
