<?php
namespace Drupal\graphql_weezevent\Plugin\GraphQL\Mutations;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Simple mutation for creating a new weezevent node.
 *
 * @GraphQLMutation(
 *   id = "create_weezevent",
 *   entity_type = "node",
 *   entity_bundle = "weezevent",
 *   secure = true,
 *   name = "createWeezevent",
 *   type = "EntityCrudOutput!",
 *   arguments = {
 *     "input" = "WeezeventInput"
 *   }
 * )
 */
class CreateWeezevent extends CreateEntityBase {
    /**
     * {@inheritdoc}
     */
    protected function extractEntityInput($value, array $args, ResolveContext $context, \GraphQL\Type\Definition\ResolveInfo $info)
    {

        return [
            'title' => "Weezevent auto import for tournament ".$args['input']['tournament'] ,
            'field_weezevent_data' => $args['input']['data'],
            'field_weezevent_tournament' => $args['input']['tournament']
        ];
    }

}