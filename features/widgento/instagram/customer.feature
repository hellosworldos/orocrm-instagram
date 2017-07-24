Feature: Customer instagram attributes
  New attribute instagram ID is added to customer entity

  Scenario: Adding new customer attribute on module installation
    Given the module "Widgento/OroCrmInstagramBundle" is not installed
    When I execute database migration
    Then attribute "instagram_id" exists for "customer" entity