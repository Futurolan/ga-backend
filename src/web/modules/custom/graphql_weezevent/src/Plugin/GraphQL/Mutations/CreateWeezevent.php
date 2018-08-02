<?php
namespace Drupal\graphql_weezevent\Plugin\GraphQL\Mutations;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Site\Settings;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql_core\GraphQL\EntityCrudOutputWrapper;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;

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
                'title' => "Weezevent auto import for tournament " . $args['input']['tournament'],
                'field_weezevent_data' => $args['input']['data'],
                'field_weezevent_tournament' => $args['input']['tournament']
            ];

    }

    protected function resolveOutput(EntityInterface $entity, array $args, \GraphQL\Type\Definition\ResolveInfo $info)
    {
        if($args['input']['token'] == Settings::get('weezevent_token')) {
            \Drupal::logger('my_module')->notice("PAF OK");

            return parent::resolveOutput($entity, $args, $info);

        }else{
            \Drupal::logger('my_module')->notice("PAF TRAP");

            return new EntityCrudOutputWrapper(NULL, NULL, [
                $this->t('Invalid token for weezevent action'),
            ]);
        }
    }

}