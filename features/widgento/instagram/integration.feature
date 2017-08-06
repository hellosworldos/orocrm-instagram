Feature: Instagram integration type
  Admin can select company account and get it's API KEY

  Automatic subscribers should be added to Instagram API
  for all posts and mentions in case the integration is active.
  Subscriptions should be discarded if integration is not active.

  Background:
    Given I am logged in as admin

  @ui
  Scenario: as admin I can create integrations with type "Instagram"
    When I go to integration/create
    Then I can select form "type" with value "instagram"
    And there is a field "client_id"
    And there is a field "client_secret"
    And there is a field "access_token"
    And button "Request access token" is "disabled"

    When I set value "client_id-value" to "client_id"
    And I set value "client_secret-value" to "client_secret"
    Then button "Request access token" is "enabled"

    When I set value "" to "client_secret"
    Then button "Request access token" is "disabled"

    When I set value "client_secret-value" to "client_secret"
    And I click button "Request access token"
    Then new popup is open "https://api.instagram.com/oauth/authorize/?client_id=client_id-value&redirect_uri=REDIRECT-URI&response_type=code"

#  Scenario: user returns from instagram confirmation page with success
#    When I go to integration/instagram/confirmation?code=SUCCESS_CODE
#    Then


  Scenario: as API user I can create integrations with type "Instagram"