Feature: Test positive and negative scenarios for Contact Us feature

  Background:
    Given I am on homepage

  Scenario: As a Guest,
    I should be able to fill in the Contact form
    and submit it
    When I follow "Contact us"
    Then I should see "Customer service - Contact us"
    When I select "2" from "id_contact"
    When I fill in "email" with "iyengarshweta@gmail.com"
    When I fill in "id_order" with "123456"
    When I attach the file "C:\Users\Shweta Sharma\Pictures\support\alteredmargin.png" to "fileUpload"
    When I fill in "message" with "Automation testing"
    When I press "submitMessage"
    Then I should see "Your message has been successfully sent to our team."

  Scenario: As a Guest,
    I should be not allowed with the Contact process
    without entering an email ID
    When I follow "Contact us"
    When I press "submitMessage"
    Then I should see "Invalid email address."

  Scenario: As a Guest,
    If I try to submit the form without filling a message
    I should be prompted to type in a message
    When I follow "Contact us"
    When I fill in "email" with "iyengarshweta@gmail.com"
    When I press "submitMessage"
    Then I should see "The message cannot be blank."