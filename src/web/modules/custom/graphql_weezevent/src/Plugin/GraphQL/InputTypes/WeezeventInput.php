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
 *     "title" = "String",
 *     "data" = {
 *       "type" = "String",
 *       "nullable" = "TRUE"
 *     },
 *     "tournament" = {
 *       "type" = "Int",
 *       "nullable" = "TRUE"
 *     }
 *   }
 * )
 */
class WeezeventInput extends InputTypePluginBase {
}