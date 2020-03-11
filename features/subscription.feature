Feature: Test positive and negative scenarios for Subscription feature

  Background:
    Given I am on homepage

  @id:1
  Scenario: As a Guest
    I should be able to subscribe
    on filling a valid Email ID
    When I enter a valid email ID in field "newsletter-input"
    And I press "submitNewsletter"
    Then I should see "Newsletter : You have successfully subscribed to this newsletter."

  @id:2
  Scenario: As a Guest
    I should not be able to subscribe to the site
    using an already subscribed email ID
    When I fill in "newsletter-input" with "iyengarshweta@gmail.com"
    And I press "submitNewsletter"
    Then I should see "This email address is already registered."

  @id:3
  Scenario: As a Guest
    I should not be able to subscribe with a blank email ID
    When I press "submitNewsletter"
    Then I should see "Newsletter : Invalid email address."