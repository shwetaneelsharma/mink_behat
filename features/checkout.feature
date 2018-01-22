Feature: Test various Checkout scenarios

  @javascript
  Scenario: As a Guest
    I should be able to place an order
    by first adding to cart and then logging in
    Given I am on homepage
    When I follow "Women"
    And I click an element having "#center_column > ul > li:nth-child(1) > div > div.right-block > h5 > a"
    When I press "Add to cart"
    And I wait for AJAX to finish
    And I follow "Proceed to checkout"
    When I click an element having "#center_column > p.cart_navigation.clearfix > a.button.btn.btn-default.standard-checkout.button-medium"
    And I fill in "email" with "niki01jain@gmail.com"
    When I fill in "passwd" with "nikita@123"
    And I press "Sign in"
    When I press "processAddress"
    And I check "cgv"
    When I press "processCarrier"
    And I follow "Pay by bank wire"
    When I click an element having "#cart_navigation > button"
    Then I should see "Your order on My Store is complete."
    And I should see "Order confirmation"
