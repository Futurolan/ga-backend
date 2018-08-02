<?php
namespace Drupal\graphql_weezevent\Plugin\GraphQL\InputTypes;
use Drupal\graphql\Plugin\GraphQL\InputTypes\InputTypePluginBase;

/**
 * The input type for article mutations.
 *
 * @GraphQLInputType(
 *   id = "weezevent_input",
 *   name = "WeezeventInput",
 *   fields = {
 *     "token" = "String!",
 *     "data" = "String!",
 *     "tournament" = "Int!"
 *   }
 * )
 */
class WeezeventInput extends InputTypePluginBase {

}