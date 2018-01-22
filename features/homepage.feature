Feature: Test various scenarios for Homepage

  Background:
    Given I am on homepage

  Scenario: As a Guest
    I should be able to view the header and footer on homepage
    Then I should be able to view the header
    And I should be able to view the footer

  @javascript
  Scenario Outline: As a Guest
    I should be able to view the drop-down list
    for the main menu items
    When I hover over "link" "<menu>"
    And I wait 2 seconds
    Then I should see "<item_name>"
    Examples:
    |menu|item_name|
    |Women|Tops    |
    |Women|Dresses |
    |Women|T-shirts|
    |Women|Blouses |
    |Women|Casual Dresses|