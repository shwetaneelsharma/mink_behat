<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Snippet\Snippet;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given /^I wait for the page to load$/
     */
    public function iWaitForThePageToLoad()
    {
        $this->getSession()->wait(20000, '(0 === jQuery.active)');
    }

    /**
     * @When /^I enter a valid email ID in field "([^"]*)"$/
     */
    public function iEnterAValidEmailID($field)
    {
        $randomString = 'randemail' . rand(2, getrandmax());
        $email_id = $randomString . '@gmail.com';
        $this->getSession()->getPage()->fillField($field, $email_id);
    }

    /**
     * @Then /^I should be able to view the header$/
     */
    public function iShouldBeAbleToViewTheHeader()
    {
        $page = $this->getSession()->getPage();
        $header_class = $page->find('css', '.header-container');
        if ($header_class !== null) {
            $header_id = $header_class->findById('header');
            $banner = $header_id->find('css', '.banner');
            if ($banner == null) {
                throw new Exception('Banner is missing');
            }
            $contact = $header_id->find('css', '.nav');
            if ($contact == null) {
                throw new Exception('Contact number and links to Contact Us, Sign in missing');
            }
            $logo = $page->findById('header_logo');
            if ($logo == null) {
                throw new Exception('Logo is not displayed in the header');
            }
            $search = $page->findById('search_block_top');
            if ($search == null) {
                throw new Exception('Search block is not displayed in the header');
            }
            $cart = $page->find('css', '.shopping_cart');
            if ($cart == null) {
                throw new Exception('Shopping cart is not displayed in the header');
            }
            $menu = $page->findById('block_top_menu');
            if ($menu == null) {
                throw new Exception('Main menu is not displayed');
            }
        }
    }

    /**
     * @Given /^I should be able to view the footer$/
     */
    public function iShouldBeAbleToViewTheFooter()
    {
        $page = $this->getSession()->getPage();
        $footer_class = $page->find('css', '.footer-container');
        if ($footer_class == null) {
            throw new Exception('Footer is missing');
        }
    }

    /**
     * @When /^I hover over "([^"]*)" "([^"]*)"$/
     */
    public function iHoverOver($type, $value)
    {
        $page = $this->getSession()->getPage();
        $parent = $page->find('named', array($type, $value));
        if ($parent !== null) {
            $parent->mouseOver();
        } else {
            throw new Exception($value . $type . ' is not found.');
        }
    }

    /**
     * @Given /^I wait (\d+) seconds$/
     */
    public function iWaitSeconds($seconds)
    {
        sleep($seconds);
    }

    /**
     * @Given /^I click an element having "([^"]*)"$/
     */
    public function iClickAnElementHaving($css)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $css);
        if ($element !== null) {
            $element->click();
        } else {
            throw new Exception('Element not found');
        }
    }

    /**
     * @Given /^I wait for AJAX to finish$/
     */
    public function iWaitForAJAXToFinish()
    {
        $this->getSession()->wait(10000, '(typeof(jQuery)=="undefined" || (0 === jQuery.active && 0 === jQuery(\':animated\').length))');
    }

    /**
     * Scrolls an element into the viewport.
     *
     * @param string $selector
     *   The element's CSS selector.
     *
     * @When I scroll to the :selector element
     */
    public function scrollToElement($selector)
    {
        $this->getSession()
            ->executeScript('document.querySelector("' . addslashes($selector) . '").scrollIntoView()');
    }
}
